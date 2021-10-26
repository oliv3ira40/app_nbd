<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Helpers\HelpAdmin;
use App\Helpers\Peoples\HelpSales;

use App\Http\Requests\Sales\gerenateReport;

use App\Models\Admin\User;
use App\Models\Sales\Sale;
use App\Models\Sales\Report;
use App\Models\Entities\Entity;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list() {
        $data['reports'] = Report::orderBy('created_at', 'desc')->get();
        // if (HelpAdmin::IsUserDeveloper()) {
        //     $data['ranking_num_sales'] = HelpSales::getRankingNumSales();
        //     $data['ranking_values'] = HelpSales::getRankingShoppValues();
        // }

        $auth_user = \Auth::User();
        if (HelpAdmin::IsUserShopkeeper()) {
            $data['reports'] = $data['reports']->where('entity_id', $auth_user->UserHasEntity->Entity->id);
        }

        return view('sales.reports.list', compact('data'));
    }

    public function new() {
        // HelpSales::computingNewSalesForReports();

        $data['users_professionals'] = HelpAdmin::UsersProfessional()->where('group_for_entity_id', 1);
        $data['users_offices'] = HelpAdmin::UsersOffice()->where('group_for_entity_id', 1);
        $data['users_shopkeepers'] = HelpAdmin::UsersShopkeeper()->where('group_for_entity_id', 1);

        return view('sales.reports.new', compact('data'));
    }
    public function save(gerenateReport $req) {
        $bar = DIRECTORY_SEPARATOR;
        $data = $req->all();
        $data['user_id'] = \Auth::User()->id;
        if (HelpAdmin::IsUserShopkeeper()) {
            $data['entity_id'] = \Auth::User()->UserHasEntity->Entity->id;
        }

        $sales = HelpSales::getFilteredSales($data);
        $ranking = HelpSales::prepareRanking($data, $sales);
        $get_url_to_save_storage = HelpAdmin::getUrlToSaveStorageMpdf();

        // HTML
            $trs_stores = '';
            $trs_stores .= '
                <tr bgcolor="#2196F3">
                    <td style="color: white;">Profissional / Escritório</td>
            ';
            foreach ($ranking['rating_by_store'] as $key => $rating_by_store) {
                $shopkeeper = Entity::find($key);

                $trs_stores .= '
                    <td style="color: white;">'.$shopkeeper->company_name.'</td>
                ';
            }
            $trs_stores .= '<td style="color: white;">TOTAL</td>';
            $trs_stores .= '</tr>';

            $professional_and_offices = '';
            foreach ($ranking['overall_rating_of_user_points'] as $user_points_id => $user_points) {
                $specifier_entity = Entity::find($user_points_id);

                $professional_and_offices .= '<tr>';
                $professional_and_offices .= '<td>'.$specifier_entity->company_name.'</td>';
                
                foreach ($ranking['rating_by_store'] as $user_id => $rating_by_store) {

                    if ($data['ranking_types'] == 1) {
                        $professional_and_offices .= '<td>
                            '.$rating_by_store[$user_points_id].'
                        </td>';
                    } else {
                        $professional_and_offices .= '<td>
                            '.$rating_by_store[$user_points_id]['points'].'
                        </td>';
                    }
                }
                $professional_and_offices .= '<td>'.$user_points['points'].'</td>';
                
                $professional_and_offices .= '</tr>';
            }

            $full_html = '
                <style>
                    table {
                        border-collapse: separate;
                        empty-cells: hide;
                        width: 100%;
                    }
                    td {
                        padding: 0px;
                        margin: 0px;
                        border-bottom: 1px solid black;
                    }
                </style>

                <table cellSpacing="0" class="separate">
                    <thead>
                        '.$trs_stores.'
                    </thead>
                    <tbody>
                        '.$professional_and_offices.'
                    </tbody>
                </table>
                <br>
            ';

            if ( !(isset($data['purchase_date']) AND $data['purchase_date'] != null) ) {
                $dateObj   = \DateTime::createFromFormat('!m', $data['selected_month']);
                $data['purchase_date'] = strftime('%B', strtotime($dateObj->format('Y-m-d')));
                $data['purchase_date'] = ucfirst($data['purchase_date']);
            }
                
            $data['created_at'] = (isset($data['created_at']) AND $data['created_at'] != null) ? $data['created_at'] : 'Não especificado';
            if ($data['ranking_types'] == 1)
            {
                $data['ranking_types'] = 'Pontuação';
            } elseif($data['ranking_types'] == 2)
            {
                $data['ranking_types'] = 'Vendas';
            } else
            {
                $data['ranking_types'] = 'Pontuação e Vendas';
            }
            $html_header = '
                <div>
                    <span style="font-size:16px;"><b>Relatório de controle de vendas</b></span><br>
                    <div style="height: 8px;"></div>

                    <span>Preposto: '.HelpAdmin::completName().'</span><br>
                    <span>Período de vendas: '.$data['purchase_date'].'</span><br>
                    <span>Total de vendas: '.$sales->count().'</span><br>
                    <span>Tipo de relatório: '.$data['ranking_types'].'</span><br>
                    <span>Data de emissão do relatório: '.date('d/m/Y H:i').'</span><br>
                </div>
                <br>
            ';
        // HTML

        // XLS
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
            $spreadsheet = $reader->loadFromString($html_header.$full_html);
            $spreadsheet->getSheetByName('Relatório de controle');

            // ALL WIDTHS
                // $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(22);
                // $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(14);
                // $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(14);
                // $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(14);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(14);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(14);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(14);
                // $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(14);
                // $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(14);
                // $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(14);
                // $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(14);
                // $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(14);
                // $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(14);
            // ALL WIDTHS

            $spreadsheet->getActiveSheet()->mergeCells('E2:G6');

            $highest_column = $spreadsheet->getActiveSheet()->getHighestColumn();
            // dd($highest_column);

            $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
            $drawing->setPath('assets/logo.png'); // put your path and image here
            $drawing->setCoordinates('E2');
            $drawing->setOffsetX(8);
            $drawing->setOffsetY(10);

            foreach(range('A', $highest_column) as $columnID) {
                if (!in_array($columnID, ['E', 'F', 'G'])) {
                    $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
                }
            }
            
            $drawing->setResizeProportional(false);
            $drawing->setWidthAndHeight(280,104);
            $drawing->setWorksheet($spreadsheet->getActiveSheet());

            $spreadsheet->getActiveSheet()->getStyle('A8:'.$highest_column.'8')->getFont()->setSize(11);
            $spreadsheet->getActiveSheet()->getRowDimension('8')->setRowHeight(24);
            $spreadsheet->getActiveSheet()->getStyle('A8:'.$highest_column.'8')->applyFromArray(
                [
                    'font' => [
                        'bold' => true,
                        'color' => [
                            'argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE,
                        ]
                    ],
                    'alignment' => [
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => '#084d8c',
                        ],
                    ],
                ]
            );

            $spreadsheet->getActiveSheet()->getStyle('A1:Z999')
                ->getAlignment()->setWrapText(true);

            $spreadsheet->getActiveSheet()->getStyle('A9:Z999')->getFont()->setSize(12);
            $spreadsheet->getActiveSheet()->getStyle('A9:Z999')->applyFromArray(
                [
                    'alignment' => [
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ],
                ]
            );

            // Header
                $spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
                $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
                $spreadsheet->getActiveSheet()->mergeCells('A1:'.$highest_column.'1');
                $spreadsheet->getActiveSheet()->getStyle('A1:'.$highest_column.'1')->applyFromArray(
                    [
                        'alignment' => [
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        ],
                        'font' => [
                            'color' => [
                                'argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE,
                            ]
                        ],
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => '#084d8c',
                            ],
                        ],
                    ]
                );

                $spreadsheet->getActiveSheet()->getStyle('A2:C2')->getFont()->setSize(12);
                $spreadsheet->getActiveSheet()->getRowDimension(2)->setRowHeight(20);
                $spreadsheet->getActiveSheet()->getStyle('A2:C2')->applyFromArray(
                    [
                        'alignment' => [
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            // 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                        ]
                    ]
                );
                $spreadsheet->getActiveSheet()->getStyle('A3:C3')->getFont()->setSize(12);
                $spreadsheet->getActiveSheet()->getRowDimension(3)->setRowHeight(20);
                $spreadsheet->getActiveSheet()->getStyle('A3:C3')->applyFromArray(
                    [
                        'alignment' => [
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            // 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                        ]
                    ]
                );
                $spreadsheet->getActiveSheet()->getStyle('A4:C4')->getFont()->setSize(12);
                $spreadsheet->getActiveSheet()->getRowDimension(4)->setRowHeight(20);
                $spreadsheet->getActiveSheet()->getStyle('A4:C4')->applyFromArray(
                    [
                        'alignment' => [
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            // 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                        ]
                    ]
                );
                $spreadsheet->getActiveSheet()->getStyle('A5:C5')->getFont()->setSize(12);
                $spreadsheet->getActiveSheet()->getRowDimension(5)->setRowHeight(20);
                $spreadsheet->getActiveSheet()->getStyle('A5:C5')->applyFromArray(
                    [
                        'alignment' => [
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            // 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                        ]
                    ]
                );
                $spreadsheet->getActiveSheet()->getStyle('A6:C6')->getFont()->setSize(12);
                $spreadsheet->getActiveSheet()->getRowDimension(6)->setRowHeight(20);
                $spreadsheet->getActiveSheet()->getStyle('A6:C6')->applyFromArray(
                    [
                        'alignment' => [
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            // 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                        ]
                    ]
                );
                $spreadsheet->getActiveSheet()->mergeCells('A1:C1');
                $spreadsheet->getActiveSheet()->mergeCells('A2:C2');
                $spreadsheet->getActiveSheet()->mergeCells('A3:C3');
                $spreadsheet->getActiveSheet()->mergeCells('A4:C4');
                $spreadsheet->getActiveSheet()->mergeCells('A5:C5');
                $spreadsheet->getActiveSheet()->mergeCells('A6:C6');
            // Header
        // XLS
        
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $report = Report::create($data);

        if (\Auth::User()->UserHasEntity) {
            $path_file = 'sales'.$bar.'reports'.$bar.'entity_'.$data['entity_id'].$bar.'relatorio_'.$report->id.'.xls';
        } else {
            $path_file = 'sales'.$bar.'reports'.$bar.'adm'.$bar.'relatorio_'.$report->id.'.xls';
        }
        $report->update(['data_path' => $path_file]);
        
        if (\Auth::User()->UserHasEntity) {
            Storage::makeDirectory('sales'.$bar.'reports'.$bar.'entity_'.$data['entity_id']);
        } else {
            Storage::makeDirectory('sales'.$bar.'reports'.$bar.'adm');
        }
        $writer->save($get_url_to_save_storage.$path_file);

        $response = response()->streamDownload(function() use ($spreadsheet) {
            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
            $writer->save('php://output');
        });
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment; filename="relatorio_'.$report->id.'.xls"');
        $response->send();

        // session()->flash('notification', 'success:Relatório criado!');
        // return redirect()->route('adm.reports.list');
    }
    
    public function AjaxGetCompatibleSales(Request $req) {
        $data = $req->all();

        $sales = HelpSales::getFilteredSales($data);
        $results['sales'] = $sales;
        $results['count_sales'] = $sales->count();
        
        return $results;
    }

    public function ranking() {
        $sales = HelpSales::getFilteredSales();
        $data['ranking'] = HelpSales::prepareRanking([], $sales);

        $data['users_professionals'] = HelpAdmin::UsersProfessional()->where('group_for_entity_id', 1);
        $data['users_offices'] = HelpAdmin::UsersOffice()->where('group_for_entity_id', 1);
        $specifiers = $data['users_professionals']->merge($data['users_offices']);

        // dd($data['ranking']['overall_rating_of_user_points']);
        // dd(User::find(22)->ProfessionalLink->Entity->name);



        // dd(User::whereIn('id', [24,45,46])->where('group_for_entity_id', 1)->first());
        // dd($specifiers);
        // dd(User::find(24));

        return view('sales.ranking', compact('data'));
    }
}
