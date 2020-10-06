<?php
	$config = json_decode(file_get_contents("db.db"),true);
		//处理操作
		switch ($_GET['action']) {
			case 'deluser' :
            unset($config[$_GET["msid"]]);
			file_put_contents('db.db',json_encode($config));
				break;
		}
?>
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>面试控制台</title>
    <link href="swiftmodders.css?v=bdd01b" rel="stylesheet">
    </head>
    <body data-phone-cc-input="1" class="loaded">
    
    <div id="sm-mmenu-helper" class="mm-page mm-slideout">
    
    <div class="sm-page-container">
    
    <div class="sm-content-container">
    <div class="sm-content sidebar-active main-content">
    <div class="sm-page-heading">
    <h1>面试控制台</h1>
    <ol class="breadcrumb">
    <li>
    Sends.cc </li>
    </ol>
    </div>
    <hr>
    <h3>熊孩子列表</h3>
    <hr>
    <div class="row">
    <div id="tableServicesList_wrapper" class="table-container clearfix" style="width:100%">
    <div class="table-fluid">
        <div id="datetable_table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row"><div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    </div></div><div class="row"><div class="col-sm-12"><table id="datetable_table" class="table table-list dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datetable_table_info">
    <thead>
    <tr role="row">
        <th class="text-center sorting_asc" tabindex="0" rowspan="1" colspan="1" style="width: 64px;" aria-sort="" aria-label="">学号</th>
        <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1" style="width: 200px;" aria-label="">姓名</th>
        <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1" style="width: 100px;" aria-label="">电话</th>
        <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1" style="width: 300px;" aria-label="">申请时间</th>
        <th class="text-center sorting" tabindex="0" rowspan="1" colspan="1" style="width: 57px;" aria-label="">操作</th></tr>
    </thead>
    <tbody>
    <?php
			foreach ($config as $name => $data) {
                if ($_GET["class"]== $data['class']){
				?><tr role="row" class="odd">
                <td class="text-center sorting_1" tabindex="0">
                <span class="label status status-active"><?php echo htmlspecialchars($data['serial']); ?></span></td>
                    <td class=" text-center"><?php echo htmlspecialchars($data["name"])." "; ?></td>
					<td class=" text-center"><?php echo htmlspecialchars($data["phone"])." "; ?></td>
                    <td class=" text-center"><?php echo htmlspecialchars($data["time"])." "; ?></td>
					<td class=" text-center">
                    <?php if ($_SERVER['PHP_AUTH_USER'] == $data["owner"] or $config["operator"][$_SERVER['PHP_AUTH_USER']]['boss'] == true) { ?>
						<span><a class="btn btn-danger mb-2" href="?action=deluser&msid=<?php echo $name; ?>&class=<?php echo $_GET["class"]; ?>">结束</a></span>
					</td>
                    <?php }
                    else {echo "无权操作";}?>
				</tr><?php
        }}

	?>
        </tbody></table></div></div></div></div>
    </div>
    </div>
    
    </div>
    <div class="row">
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
     <div class="clear"></div>
    <div class="sm-footer">
    </div>
    </div>
    </div>
    
    
    
    
    </body></html>