<?php
	require 'pages/header.tpl.php';
?>
        <div id="rightside">
            <div id="content">
                <div class="corners">
                    <div class="tl"></div>
                    <div class="tr"></div>
                </div>
                <div id="innercontent" style="min-height: 311px;">
                    <div class="pane" id="pane0" style="">
                        <table class="hometable">
                            <tbody>
                                <tr>
                                    <td><h4>Did you know...</h4></td>
                                </tr>
                                <tr>
                                    <td style="padding: 0 0 10px 10px;">
                                        <pre>
                                            <?php
                                                $type = execute_redis_command('type',$_GET['key']);
                                                if($type == 'string') {
                                                    $r = execute_redis_command('get',$_GET['key']);
                                                } elseif($type == 'hash') {
                                                    $r = execute_redis_command('hgetall',$_GET['key']);
                                                } elseif($type == 'list') {
                                                    
                                                } elseif($type == 'set') {
                                                    
                                                }
                                            ?><br />
Type: <?php echo $type;?> 
TTL: 
<?php echo var_dump($r);?>

                                        </pre>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="corners">
                    <div class="bl"></div>
                    <div class="br"></div>
                </div>
            </div>
        </div>
<?php
	require 'pages/footer.tpl.php';
?>