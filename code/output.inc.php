<?php
try {
  /* Include */
  require_once("../smarty/mySmarty.inc.php");
  require_once("../php_lib/menu.inc.php");

  /* Smarty */
  $_smarty->assign('userInfoDisplay', $_userInfoDisplay);
  $_smarty->assign('menu', menu($_menu));
  $_smarty->assign('inhoud', $_output);
  $_smarty->assign('jsInclude',$_jsInclude);

  $_smarty->display('basic.tpl');
}
catch (Exception $_exception) { /* Exception Handling */
  require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>