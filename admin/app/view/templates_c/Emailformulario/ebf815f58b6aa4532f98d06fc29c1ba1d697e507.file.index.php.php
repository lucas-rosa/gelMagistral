<?php /* Smarty version Smarty-3.1.1, created on 2013-01-21 09:42:00
         compiled from "app/view/templates/Rodape/index.php" */ ?>
<?php /*%%SmartyHeaderCode:149354516250fd298877ea81-69307356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebf815f58b6aa4532f98d06fc29c1ba1d697e507' => 
    array (
      0 => 'app/view/templates/Rodape/index.php',
      1 => 1355326181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149354516250fd298877ea81-69307356',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL_DEFAULT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fd298883143',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fd298883143')) {function content_50fd298883143($_smarty_tpl) {?>	</section>	
    
	</div>
	</article>

	</section>	
	
    <script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery1.7.2.min.js"%3E%3C/script%3E'))</script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/libs/selectivizr.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery/jquery.nyromodal.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery/jquery.tipsy.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery/jquery.wysiwyg.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery/jquery.datatables.js"></script>
	<script type="text/javascript" charset="utf-8">
		jQuery.fn.dataTableExt.aTypes.unshift(
		function ( sData )
		{
			if (sData !== null && sData.match(/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/(19|20|21)\d\d$/))
			{
				return 'data-br';
			}
			return null;
		});

		jQuery.extend( jQuery.fn.dataTableExt.oSort,
		{
			"data-br-pre": function ( a )
			{
				var ukDatea = a.split('/');
				return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
			},

			"data-br-asc": function ( a, b )
			{
				return ((a < b) ? -1 : ((a > b) ? 1 : 0));
			},

			"data-br-desc": function ( a, b )
			{
				return ((a < b) ? 1 : ((a > b) ? -1 : 0));
			}
		});
			
                $(document).ready(function(){	
                    $('#first-desc').dataTable({	
                        "aaSorting": [[ 0, "desc" ]]
                    } );
                    $('#first-asc').dataTable( {
                        "aaSorting": [[ 0, "asc" ]]
                    } );
                    $('#sec-asc').dataTable( {
                        "aaSorting": [[ 1, "asc" ]]
                    } );
                    $('#sec-desc').dataTable( {
                        "aaSorting": [[ 1, "desc" ]]
                    } );
                } );
            </script>							
    
	<script src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery/jquery.datepicker.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery/jquery.fileinput.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery/jquery.fullcalendar.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery/excanvas.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery/jquery.visualize.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery/jquery.visualize.tooltip.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/script.js"></script>
	
</body>
</html>
<?php }} ?>