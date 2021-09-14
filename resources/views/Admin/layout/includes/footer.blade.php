        </div>
			
        <footer class="footer container-fluid pl-30 pr-30">
            <div class="row">
                <div class="col-sm-12">
                    <p>Projeto Web: Agência L.A.* Web</p>
                </div>
            </div>
        </footer>
        
        @php
            $flash = session()->all();
            
            $notification = null;
            if (isset($flash['notification'])) {
                $notification = HelpAdmin::prepareNotification($flash['notification']);
            }
        @endphp
        
        @if ($notification != null)
            @section('type', $notification['type'])
            @section('msg', $notification['msg'])
        @endif

        <div style="display: none;" id="config_notifications" data-type="@yield('type')">@yield('msg')</div>

    </div>
<!-- /Main Content -->

</div>
<!-- /#wrapper -->

<!-- JavaScript -->

<!-- jQuery -->
<script src="{{ asset('admin_theme/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('admin_theme/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>

<!-- Data table JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('admin_theme/theme/dist/js/jquery.slimscroll.js') }}"></script>

<!-- Progressbar Animation JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('admin_theme/vendors/bower_components/jquery.counterup/jquery.counterup.min.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('admin_theme/theme/dist/js/dropdown-bootstrap-extended.js') }}"></script>

<!-- Sparkline JavaScript -->
<script src="{{ asset('admin_theme/vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>

<!-- Owl JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>

<!-- Switchery JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>

<!-- EChartJS JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/echarts/dist/echarts-en.min.js') }}"></script>
<script src="{{ asset('admin_theme/vendors/echarts-liquidfill.min.js') }}"></script>

<!-- Sweet-Alert  -->
<script src="{{ asset('admin_theme/vendors/bower_components/sweetalert/dist/sweetalert.min.js') }}"></script>
		
<script src="{{ asset('admin_theme/theme/dist/js/sweetalert-data.js') }}"></script>

<!-- Toast JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>

<!-- Moment JavaScript -->
<script type="text/javascript" src="{{ asset('admin_theme/vendors/bower_components/moment/min/moment-with-locales.min.js') }}"></script>

<!-- Bootstrap Colorpicker JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>

<!-- Select2 JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin_theme/vendors/bower_components/select2/dist/js/i18n/pt-BR.js') }}"></script>

<!-- Bootstrap Select JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

<!-- Bootstrap Tagsinput JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

<!-- Bootstrap Touchspin JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>

<!-- Multiselect JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>

<!-- Bootstrap Switch JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}"></script>

<!-- Bootstrap Datetimepicker JavaScript -->
<script type="text/javascript" src="{{ asset('admin_theme/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Form Advance Init JavaScript -->
<script src="{{ asset('admin_theme/theme/dist/js/form-advance-data.js') }}"></script>

<!-- Bootstrap Daterangepicker JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- Form Picker Init JavaScript -->
<script src="{{ asset('admin_theme/theme/dist/js/form-picker-data.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('admin_theme/theme/dist/js/dropdown-bootstrap-extended.js') }}"></script>

{{-- JQUERY-MASK --}}
<script src="{{ asset('plugins/jquery-mask-plugin/dist/jquery.mask.js') }}"></script>

{{-- Modals --}}
<script src="{{ asset('admin_theme/theme/dist/js/modal-data.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ asset('admin_theme/theme/dist/js/init.js') }}"></script>
<script src="{{ asset('admin_theme/theme/dist/js/dashboard-data.js') }}"></script>

<!-- Data table JavaScript -->
<script src="{{ asset('admin_theme/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_theme/theme/dist/js/dataTables-data.js') }}"></script>

<!-- Gallery JavaScript -->
<script src="{{ asset('admin_theme/theme/dist/js/isotope.js') }}"></script>
<script src="{{ asset('admin_theme/theme/dist/js/lightgallery-all.js') }}"></script>
<script src="{{ asset('admin_theme/theme/dist/js/froogaloop2.min.js') }}"></script>
<script src="{{ asset('admin_theme/theme/dist/js/gallery-data.js') }}"></script>

{{-- My --}}
<script src="{{ asset('js/notifications.js') }}"></script>
<script src="{{ asset('js/date_picker.js') }}"></script>
<script src="{{ asset('js/utilities/masks.js') }}"></script>
<script src="{{ asset('js/utilities/via_cep.js') }}"></script>
<script src="{{ asset('plugins/mask-money/mask-money.min.js') }}"></script>
<script src="{{ asset('js/peoples/register_sale.js') }}"></script>
<script src="{{ asset('js/div_update_password.js') }}"></script>
<script src="{{ asset('js/sales/multiples_selects_reports.js') }}"></script>
<script src="{{ asset('js/sales/report_page_interactions.js') }}"></script>
<script src="{{ asset('js/sales/search_specifiers.js') }}"></script>
<script src="{{ asset('js/sales/get_professional_link.js') }}"></script>
<script src="{{ asset('js/sales/validate_sale.js') }}"></script>

</body>

</html>