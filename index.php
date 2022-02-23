<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <link rel="icon" href="dk.png">
  <title>Live Edit X-editable</title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>  
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="navbar-header">
      <a href="#" class="navbar-brand">Dewan Komputer</a>
    </div>
  </nav>

  <div class="container">
    <h3 align="center">Live Edit Tabel Menggunakan X-editable pada PHP</h3>
    <table class="table table-bordered table-striped">
      <thead>
       <tr>
        <th width="10%">No</th>
        <th width="20%">Nama Lengkap</th>
        <th width="20%">Alamat</th>
        <th width="20%">Jenis Kelamin</th>
        <th width="20%">Jabatan</th>
        <th width="10%">Umur</th>
       </tr>
      </thead>
      <tbody id="data_karyawan"></tbody>
    </table>
  </div>

  <script type="text/javascript" language="javascript" >
    $(document).ready(function(){

      ambil_data();
     
      function ambil_data(){
        $.ajax({
          url:"ambil_data.php",
          method:"POST",
          dataType:"json",
          success:function(data){
          no=1;
          for(var count=0; count<data.length; count++){
            var html_data = '<tr><td>'+ no++ +'</td>';
            html_data += '<td data-name="nama_lengkap" class="nama_lengkap" data-type="text" data-pk="'+data[count].id+'">'+data[count].nama_lengkap+'</td>';
            html_data += '<td data-name="alamat" class="alamat" data-type="text" data-pk="'+data[count].id+'">'+data[count].alamat+'</td>';
            html_data += '<td data-name="jenkel" class="jenkel" data-type="select" data-pk="'+data[count].id+'">'+data[count].jenkel+'</td>';
            html_data += '<td data-name="jabatan" class="jabatan" data-type="text" data-pk="'+data[count].id+'">'+data[count].jabatan+'</td>';
            html_data += '<td data-name="umur" class="umur" data-type="text" data-pk="'+data[count].id+'">'+data[count].umur+'</td></tr>';
            $('#data_karyawan').append(html_data);
          }
         }
        })
      }
   
      $('#data_karyawan').editable({
        container: 'body',
        selector: 'td.nama_lengkap',
        url: "update.php",
        title: 'Nama Karyawan',
        type: "POST",
        validate: function(value){
          if($.trim(value) == ''){
            return 'This field is required';
          }
        }
      });

      $('#data_karyawan').editable({
        container: 'body',
        selector: 'td.alamat',
        url: "update.php",
        title: 'Alamat',
        type: "POST",
        validate: function(value){
          if($.trim(value) == ''){
            return 'This field is required';
          }
        }
      });
   
      $('#data_karyawan').editable({
        container: 'body',
        selector: 'td.jenkel',
        url: "update.php",
        title: 'Jenis Kelamin',
        type: "POST",
        dataType: 'json',
        source: [{value: "Laki-laki", text: "Laki-laki"}, {value: "Perempuan", text: "Perempuan"}],
        validate: function(value){
          if($.trim(value) == ''){
            return 'This field is required';
          }
        }
      });
   
      $('#data_karyawan').editable({
        container: 'body',
        selector: 'td.jabatan',
        url: "update.php",
        title: 'Designation',
        type: "POST",
        dataType: 'json',
        validate: function(value){
          if($.trim(value) == ''){
            return 'This field is required';
          }
        }
      });
   
      $('#data_karyawan').editable({
        container: 'body',
        selector: 'td.umur',
        url: "update.php",
        title: 'Umur',
        type: "POST",
        dataType: 'json',
        validate: function(value){
          if($.trim(value) == ''){
            return 'This field is required';
          }
          var regex = /^[0-9]+$/;
          if(! regex.test(value)){
            return 'Numbers only!';
          }
        }
      });
    });
  </script>
</body>
</html>