<?php if(session()->get('isLogin') == 1 &&  session()->get('type') == "2") { ?>
@include('backend.temp.sidebar.admin')   
<?php } else { ?>
@include('backend.temp.sidebar.user')
<?php } 