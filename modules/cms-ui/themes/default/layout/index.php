<?php
 if (!defined('OR_VERSION')) die('Forbidden');
 if (!headers_sent()) header('Content-Type: text/html; charset=UTF-8')
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html class="theme-<?php echo strtolower($style) ?> nojs">
<head>
<?php $appName = config('application','name'); $appOperator = config('application','operator');
      $title = $appName.(($appOperator!=$appName)?' - '.$appOperator:''); ?>
  <title data-default="<?php echo htmlentities($title,ENT_QUOTES|ENT_HTML5) ?>"><?php echo htmlentities($title,ENT_COMPAT|ENT_HTML5) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
    <?php if ( isset($refresh_url) ) { ?>
  <meta http-equiv="refresh" content="<?php echo isset($refresh_timeout)?$refresh_timeout:0 ?>; URL=<?php echo $refresh_url; if (ini_get('session.use_trans_sid')) echo '&'.session_name().'='.session_id(); ?>">
<?php } ?>
  <meta name="robots" content="noindex,nofollow" >
<?php if (isset($metaList) && is_array($metaList)) foreach( $metaList as $meta )
      {
       	?>
  <link rel="<?php echo $meta['name'] ?>" href="<?php echo $meta['url'] ?>" title="<?php echo $meta['title'] ?>" ><?php
      } ?>

<?php foreach( $jsFiles  as $jsFile ) { ?>  <script src="<?php echo $jsFile ?>" defer></script>
<?php } ?>
  <link rel="stylesheet" type="text/css" href="<?php echo OR_HTML_MODULES_DIR . 'editor/codemirror/lib/codemirror.css' ?>" />
<?php foreach( $cssFiles as $cssFile) { ?>  <link rel="stylesheet" type="text/css" href="<?php echo $cssFile ?>" />
<?php } ?>
  <link rel="stylesheet" type="text/css" href="<?php echo Html::url('index','themestyle') ?>" />
  <meta name="theme-color" content="<?php echo $themeColor ?>" />
  <link rel="manifest" href="<?php echo Html::url('index','manifest') ?>" />
</head>

<body>


<div id="workbench" class="initial-hidden">

    <header class="view" data-action="title" data-method="show">
    </header>


    <div>

        <nav>
            <header>
                <a href=""></a>
            </header>
            <div class="view-static" data-action="tree" data-method="show">
                <?php echo embedView('tree','show'); ?>
            </div>

        </nav>

        <main>
            <header>
                <span class="title"></span>
            </header>
            <div class="view" data-method="edit">
                <?php echo embedView('login','login'); ?>
            </div>

        </main>

        <aside>
            <header>
                <a href=""></a>
            </header>
            <div class="view" data-method="info">
                <?php echo embedView('login','login'); ?>
            </div>

        </aside>
    </div>

</div>


<?php /* Modal dialog */ ?>
<div id="dialog" class="panel wide">
</div>

<div id="filler">
</div>

<div id="noticebar">
</div>

<footer class="initial-hidden" id="footer">

</footer>

<noscript><div class="noscript"><em>Javascript is required to view this site</em></div></noscript>

</body>
</html>
<?php
function embedView( $action, $method ) {
    try {

        return cms_ui\UI::executeAction($action,$method);
    }
    catch (BadMethodCallException $e) {
        // Action-Method does not exist.
        return "Method dows not exist: ".$method;
    } catch (ObjectNotFoundException $e) {
        return "Object not found";
    } catch (OpenRatException $e) {
        return lang($e->key);
    } catch (SecurityException $e) {
        return("You are not allowed to execute '".$action.'/'.$method."''.");
    } catch (Exception $e) {
        return "Hups...: ".$e->__toString();
    }
}
?>