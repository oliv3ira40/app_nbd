$(function()
{
	var config_notifications = $("#config_notifications");
	var defined_type = config_notifications.attr('data-type');

	if (config_notifications.text().length > 0)
	{

		var available_types = {
			'info':
			{
				'title'		:	'Informação',
				'loaderBg'	:	'#fec107',
				'icon'		:	'info'
			},
			'warning':
			{
				'title'		:	'Atenção',
				'loaderBg'	:	'#ff2a00',
				'icon'		:	'warning',
			},
			'success':
			{
				'title'		:	'Sucesso',
				'loaderBg'	:	'#fec107',
				'icon'		:	'success',
			},
			'error':
			{
				'title'		:	'Erro',
				'loaderBg'	:	'#fec107',
				'icon'		:	'error',
			}
		}
	
		if (defined_type == 'info')
		{
			runNotification(available_types.info);
		} else if(defined_type == 'warning')
		{
			runNotification(available_types.warning)
		} else if(defined_type == 'success')
		{
			runNotification(available_types.success)
		} else {
			runNotification(available_types.error)
		}
		
		function runNotification(config)
		{
			$.toast().reset('all'); 
			$("body").removeAttr('class');
			$.toast({
				heading: config.title,
				text: config_notifications.text(),
				position: 'top-right',
				loaderBg: config.loaderBg,
				icon: config.icon,
				hideAfter: 8000, 
				stack: 6
			});
			return false;
		}

	}

});