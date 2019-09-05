<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Signin Template for Bootstrap</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.1/dist/sweetalert2.all.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" href="<?=CONTENT_WEBROOT?>colorbox-master/example1/colorbox.css" />
 <script src="<?=CONTENT_WEBROOT?>colorbox-master/jquery.colorbox.js"></script>
  <style>
  .form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
  </style>

  </head>

  <body>

    <div class="container">
  
      <form class="form-signin" pb-autologin="true" autocomplete="off" method="POST" action="?mode=login&action=login">
        <h2 class="form-signin-heading">Bienvenido</h2>
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input name="usuario" type="text" id="inputEmail" class="form-control" placeholder="Usuario" required="" autofocus="" pb-role="usuario"><br>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input name="clave" type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="" pb-role="clave">
         <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" pb-role="submit">Entrar</button>
      <passwordboxicon pb-icon="username" icon-type="main" style="position: absolute; background: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAQCAYAAAAI0W+oAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDE0IDc5LjE1Njc5NywgMjAxNC8wOC8yMC0wOTo1MzowMiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NzU4NUJBRkU1QkVFMTFFNDkyRkVDMDk0Nzk5RDFBMDQiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NzU4NUJBRkQ1QkVFMTFFNDkyRkVDMDk0Nzk5RDFBMDQiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjA5M0ZFMjdERDI5NDExRTE5Njc0OTU4Rjk3NzgwODJEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjA5M0ZFMjdFRDI5NDExRTE5Njc0OTU4Rjk3NzgwODJEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+MHuEgAAAAWtJREFUeNq8VCFMxEAQ3DZ1RRdfSUBTcg6JwdfjeQsaJCXYDxZ03/+7BtD/BsMLDAFdXebu9r7bpnxLSZhkvr9719vu7uxRVVXUiUlxDUbCjo2vA/qMPvr0M17AI2En7BsFX3xxBIZi7Qk8FvYh+9z+sJHx4EBEMXiHlw+MlalP/M7E+ox9xHvu+Z1B8HT9PM+r+0B0CU5x6DP7FAcu2NYlPAOv4HtzPfpdIFcSIs2Sgy7Bd/DEHO7WMlVKMfRii+rOwVTYqfGNVF2wkbJUW6ZyPCNTwho5Z6j3n7I4HC76Egq4/l0bS5b0XMi75P05B7a46S9dsGXt0WQwKXbwfAVT7tEotFWnG637sDJfbUv0Be6Ba/jm7NsHb50ghojBb1wxdjZWXBo3pB/ggkvnyrbmmYvHDGxomuqC2Ox2zazYeYk3N0emHoTUB6HuUaaWrbWkceXY/7U4eFjHZEQdgRatSzb5kxj+A98CDADG3MBsPyzvawAAAABJRU5ErkJggg==&quot;) right center no-repeat; width: 30px; height: 44px; z-index: 2; visibility: visible; top: 117.8px; left: 879.6px;"></passwordboxicon><passwordboxicon pb-icon="password" icon-type="main" style="position: absolute; background: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAQCAYAAAAI0W+oAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDE0IDc5LjE1Njc5NywgMjAxNC8wOC8yMC0wOTo1MzowMiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NzU4NUJBRkU1QkVFMTFFNDkyRkVDMDk0Nzk5RDFBMDQiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NzU4NUJBRkQ1QkVFMTFFNDkyRkVDMDk0Nzk5RDFBMDQiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjA5M0ZFMjdERDI5NDExRTE5Njc0OTU4Rjk3NzgwODJEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjA5M0ZFMjdFRDI5NDExRTE5Njc0OTU4Rjk3NzgwODJEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+MHuEgAAAAWtJREFUeNq8VCFMxEAQ3DZ1RRdfSUBTcg6JwdfjeQsaJCXYDxZ03/+7BtD/BsMLDAFdXebu9r7bpnxLSZhkvr9719vu7uxRVVXUiUlxDUbCjo2vA/qMPvr0M17AI2En7BsFX3xxBIZi7Qk8FvYh+9z+sJHx4EBEMXiHlw+MlalP/M7E+ox9xHvu+Z1B8HT9PM+r+0B0CU5x6DP7FAcu2NYlPAOv4HtzPfpdIFcSIs2Sgy7Bd/DEHO7WMlVKMfRii+rOwVTYqfGNVF2wkbJUW6ZyPCNTwho5Z6j3n7I4HC76Egq4/l0bS5b0XMi75P05B7a46S9dsGXt0WQwKXbwfAVT7tEotFWnG637sDJfbUv0Be6Ba/jm7NsHb50ghojBb1wxdjZWXBo3pB/ggkvnyrbmmYvHDGxomuqC2Ox2zazYeYk3N0emHoTUB6HuUaaWrbWkceXY/7U4eFjHZEQdgRatSzb5kxj+A98CDADG3MBsPyzvawAAAABJRU5ErkJggg==&quot;) right center no-repeat; width: 30px; height: 44px; z-index: 3; visibility: visible; top: 161.2px; left: 879.6px;"></passwordboxicon></form>
<?php if($error==1){?> 
<div class="alert alert-danger" role="alert">
        <strong>Algo salio mal!</strong> Por favor intente de nuevo.
      </div>
<?php } ?>
    </div> <!-- /container -->

    

</body></html>