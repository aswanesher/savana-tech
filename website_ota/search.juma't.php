<?PHP
	if($_POST['menu'] == "list" && $_POST['tags'] != "" && $_POST['in'] != "" && $_POST['out'] != "" && $_POST['adult'] != "" && $_POST['child'] != ""){
		$pax = $_POST['adult'] + $_POST['child'];
		header('Location: index.php?menu=list&loc='.$_POST['tags'].'&in='.$_POST['in'].'&out='.$_POST['out'].'&pax='.$pax.'');
	}elseif($_POST['menu'] == "details" && $_POST['id'] != "" && $_POST['in'] != "" && $_POST['out'] != "" && $_POST['adult'] != "" && $_POST['child'] != ""){
		$pax = $_POST['adult'] + $_POST['child'];
		header('Location: index.php?menu=details&id='.$_POST['id'].'&in='.$_POST['in'].'&out='.$_POST['out'].'&pax='.$pax.'');
	}elseif($_POST['menu'] == "book" && $_POST['id'] != "" && $_POST['in'] != "" && $_POST['out'] != "" && $_POST['pax'] != "" && $_POST['noroom'] != "" && $_POST['type'] != ""){
		header('Location: booking/menu/book/id/'.$_POST['id'].'/in/'.$_POST['in'].'/out/'.$_POST['out'].'/pax/'.$_POST['pax'].'/noroom/'.$_POST['noroom'].'/type/'.$_POST['type'].'');
	}else if($_POST['menu'] == "reschedule" && $_POST['tags'] != "" && $_POST['in'] != "" && $_POST['out'] != "" && $_POST['pax'] != ""){
		$pax = $_POST['pax'];
		header('Location: index.php?menu=list&loc='.$_POST['tags'].'&in='.$_POST['in'].'&out='.$_POST['out'].'&pax='.$pax.'');
	}else if($_POST['act'] == "rev" && $_POST['id'] != "" && $_POST['in'] != "" && $_POST['out'] != "" && $_POST['adult'] != "" && $_POST['child'] != ""){
		$pax = $_POST['adult'] + $_POST['child'];
		header('Location: index.php?menu=details&id='.$_POST['id'].'&in='.$_POST['in'].'&out='.$_POST['out'].'&pax='.$pax.'');
	}else{
		header('Location: index.php?res=Not Found');
	}
?>