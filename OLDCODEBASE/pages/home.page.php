<?php
	require 'pages/header.tpl.php';
	$data = execute_redis_command('info',NULL);
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
                  <td><h4>Welcome to phpMyRedis</h4></td>
                </tr>
                <tr>
                  <td style="padding: 0 0 13px 10px"><p>You are connected to Redis <?php echo $data['redis_version']; ?></p>
                    <table cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td class="inputfield"> Updates: </td>
                          <td> <?php check_update('phpmyadmin-0.2.1'); ?> </td>
                        </tr>
                        <tr>
                          <td class="inputfield"> Language: </td>
                          <td><select onChange="switchLanguage()" id="langSwitcher">
                              <option selected="selected" value="en_US">English</option>
                            </select></td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
                <tr>
                  <td><h4>Getting started</h4></td>
                </tr>
                <tr>
                  <td style="padding: 1px 0 15px 10px"><ul>
                      <li><a href="http://www.sqlbuddy.com/help/">Help</a></li>
                      <li><a href="http://www.sqlbuddy.com/translations/">Translations</a></li>
                      <li><a href="http://www.sqlbuddy.com/contact/">Contact</a></li>
                    </ul></td>
                </tr>
                <tr>
                  <td><h4>Server Stats</h4></td>
                </tr>
                <tr>
                  <td style="padding: 0px 0 20px 10px"><form onSubmit="createDatabase(); return false;">
                      <table cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td class="inputfield"> Version</td>
                            <td><?php echo $data['redis_version']; ?></td>
                          </tr>
                          <tr>
                            <td class="inputfield">Memory Used</td>
                            <td><?php echo $data['used_memory_human']; ?></td>
                          </tr>
                          <tr>
                            <td class="inputfield">Clients Connected</td>
                            <td><?php echo $data['connected_clients']; ?></td>
                          </tr>
                          <tr>
                            <td class="inputfield">Slaves Connected</td>
                            <td><?php echo $data['connected_slaves']; ?></td>
                          </tr>
                        </tbody>
                      </table>
                  </form></td>
                </tr>
                <tr>
                  <td><h4>Did you know...</h4></td>
                </tr>
                <tr>
                  <td style="padding: 0 0 10px 10px;"><p>The login page is based on a default user of root@localhost. By editing config.php, you can change the default user and host to whatever you want.</p></td>
                </tr>
                <tr>
                  <td><h4>Keyboard shortcuts</h4></td>
                </tr>
                <tr>
                  <td style="padding: 4px 0 5px 10px"><table class="keyboardtable">
                      <tbody>
                        <tr>
                          <th>Press this key...</th>
                          <th>...and this will happen</th>
                        </tr>
                        <tr>
                          <td>a</td>
                          <td>select all</td>
                        </tr>
                        <tr>
                          <td>n</td>
                          <td>select none</td>
                        </tr>
                        <tr>
                          <td>e</td>
                          <td>edit selected items</td>
                        </tr>
                        <tr>
                          <td>d</td>
                          <td>delete selected items</td>
                        </tr>
                        <tr>
                          <td>r</td>
                          <td>refresh page</td>
                        </tr>
                        <tr>
                          <td>q</td>
                          <td>load the query tab</td>
                        </tr>
                        <tr>
                          <td>f</td>
                          <td>browse tab - go to first page of results</td>
                        </tr>
                        <tr>
                          <td>l</td>
                          <td>browse tab - go to last page of results</td>
                        </tr>
                        <tr>
                          <td>g</td>
                          <td>browse tab - go to previous page of results</td>
                        </tr>
                        <tr>
                          <td>h</td>
                          <td>browse tab - go to next page of results</td>
                        </tr>
                        <tr>
                          <td>o</td>
                          <td>optimize selected tables</td>
                        </tr>
                      </tbody>
                    </table></td>
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