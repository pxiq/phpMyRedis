<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">

<html xml:lang="en" version="-//W3C//DTD XHTML 1.1//EN" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>SQL Buddy - Home</title>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
	<link href="frontend/common.css" rel="stylesheet" type="text/css" />
	<link href="frontend/navigation.css" rel="stylesheet" type="text/css" />
	<link href="frontend/css/main.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="mootools-core.js"></script>
	<script type="text/javascript" src="functions.js"></script>
</head>
<body>
<div id="container">
  <div id="header">
    <div id="headerlogo"> <a onClick="sideMainClick('home.php', 0); return false;" href="#page=home"><img src="images/logo.png"></a> </div>
    <div id="toptabs">
      <ul>
        <li id="0" class="selected"><a href="#page=home">Home</a></li>
        <li id="1"><a href="?do=browse">Browse Database</a></li>
        <li id="2"><a href="?do=create">Create Key</a></li>
        <li id="3"><a href="#page=import&amp;topTab=3">Import</a></li>
        <li id="4"><a href="#page=export&amp;topTab=4">Export</a></li>
      </ul>
    </div>
    <div id="headerinfo"><a href="logout.php">Logout</a> </div>
    <div class="clearer"></div>
  </div>
  <div id="bottom" style="opacity: 1;">
    <div id="leftside">
      <div id="sidemenu" style="height: 749px;">
        <div class="dblist">
          <ul>
            <li id="sidehome" class="selected"><a href="?">
              <div class="menuicon">&gt;</div>
              <div class="menutext">Home</div>
              </a></li>
            <li id="sideusers" class=""><a href="?do=browse">
              <div class="menuicon">&gt;</div>
              <div class="menutext">Browse</div>
              </a></li>
            <li id="sidequery" class=""><a onClick="sideMainClick('query.php', 2); return false;" href="#page=query&amp;topTab=2">
              <div class="menuicon">&gt;</div>
              <div class="menutext">Query</div>
              </a></li>
            <li id="sideimport" class=""><a onClick="sideMainClick('import.php', 3); return false;" href="#page=import&amp;topTab=3">
              <div class="menuicon">&gt;</div>
              <div class="menutext">Import</div>
              </a></li>
            <li id="sideexport" class=""><a onClick="sideMainClick('export.php', 4); return false;" href="#page=export&amp;topTab=4">
              <div class="menuicon">&gt;</div>
              <div class="menutext">Export</div>
              </a></li>
            <li id="sidesettings" class=""><a onClick="sideMainClick('export.php', 4); return false;" href="#page=export&amp;topTab=4">
              <div class="menuicon">&gt;</div>
              <div class="menutext">Database Tools</div>
              </a></li>
          </ul>
        </div>
        <div class="dblistheader">Databases</div>
        <div id="databaselist" class="dblist">
          <ul>
            <li id="db0" class=""><a></a><a class="menutoggler"></a><a class="menutext" href="#page=dboverview&amp;db=aa_cms&amp;topTabSet=1&amp;topTab=0">aa_cms</a>
              <ul class="sublist" id="sublist0" style="height: 0px; display: none;">
                <li id="sub1" class=""><a href="#page=browse&amp;db=aa_cms&amp;table=sym_authors&amp;topTabSet=2&amp;topTab=0">sym_authors<span class="subcount">(1)</span></a></li>
                <li id="sub2" class=""><a href="#page=browse&amp;db=aa_cms&amp;table=sym_cache&amp;topTabSet=2&amp;topTab=0">sym_cache<span class="subcount">(1)</span></a></li>
                <li id="sub43" class=""><a href="#page=browse&amp;db=aa_cms&amp;table=sym_sessions&amp;topTabSet=2&amp;topTab=0">sym_sessions<span class="subcount">(5)</span></a></li>
              </ul>
            </li>
            <li id="db1" class=""><a></a><a class="menutoggler"></a><a class="menutext" href="#page=dboverview&amp;db=information_schema&amp;topTabSet=1&amp;topTab=0">information_schema</a>
              <ul class="sublist" id="sublist1" style="height: 0px; display: none;">
                <li id="sub44" class=""><a href="#page=browse&amp;db=information_schema&amp;table=CHARACTER_SETS&amp;topTabSet=2&amp;topTab=0">CHARACTER_SETS<span class="subcount">(36)</span></a></li>
                <li id="sub45" class=""><a href="#page=browse&amp;db=information_schema&amp;table=COLLATIONS&amp;topTabSet=2&amp;topTab=0">COLLATIONS<span class="subcount">(127)</span></a></li>
                <li id="sub46" class=""><a href="#page=browse&amp;db=information_schema&amp;table=COLLATION_CHARACTER_SET_APPLICABILITY&amp;topTabSet=2&amp;topTab=0">COLLATION_CHARACTER_SET_APPLICABILITY<span class="subcount">(128)</span></a></li>
              </ul>
            </li>
            <li id="db2" class=""><a></a><a class="menutoggler"></a><a class="menutext" href="#page=dboverview&amp;db=lw_redmine&amp;topTabSet=1&amp;topTab=0">lw_redmine</a>
              <ul class="sublist" id="sublist2" style="height: 0px; display: none;">
                <li id="sub116" class=""><a href="#page=browse&amp;db=lw_redmine&amp;table=wiki_pages&amp;topTabSet=2&amp;topTab=0">wiki_pages<span class="subcount">(3)</span></a></li>
                <li id="sub117" class=""><a href="#page=browse&amp;db=lw_redmine&amp;table=wiki_redirects&amp;topTabSet=2&amp;topTab=0">wiki_redirects<span class="subcount">(0)</span></a></li>
                <li id="sub118" class=""><a href="#page=browse&amp;db=lw_redmine&amp;table=workflows&amp;topTabSet=2&amp;topTab=0">workflows<span class="subcount">(144)</span></a></li>
              </ul>
            </li>
            <li id="db3" class=""><a></a><a class="menutoggler"></a><a class="menutext" href="#page=dboverview&amp;db=lw_tp&amp;topTabSet=1&amp;topTab=0">lw_tp</a>
              <ul class="sublist" id="sublist3" style="height: 0px; display: none;">
                <li id="sub206" class=""><a href="#page=browse&amp;db=lw_tp&amp;table=txp_prefs&amp;topTabSet=2&amp;topTab=0">txp_prefs<span class="subcount">(115)</span></a></li>
                <li id="sub207" class=""><a href="#page=browse&amp;db=lw_tp&amp;table=txp_section&amp;topTabSet=2&amp;topTab=0">txp_section<span class="subcount">(4)</span></a></li>
                <li id="sub208" class=""><a href="#page=browse&amp;db=lw_tp&amp;table=txp_users&amp;topTabSet=2&amp;topTab=0">txp_users<span class="subcount">(1)</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
