@extends('layouts.app')
@section('content')

  <h1>E2E Department</h1>

  {!! Form::open(['url' => 'form/submit']) !!}

    <div class = "form-group">
      {{Form::label('', 'Student Number:')}}
      {{Form::tel('student_number', '',  ['class' => 'form-control', 'placeholder' => 'Enter Student Number', 'onkeypress="return event.charCode >= 48 && event.charCode <= 57"', 'required'])}}
    </div>

    <div class="form-group">
      <label>Student Type:</label>
      {!! Form::select('id_studenttype',[''=>'']+$studenttype,null,['class'=>'form-control','required']) !!}
    </div>


    <div class="form-group">
      <label>Select Concern:</label>
      {!! Form::select('id_concern',[''=>''],null,['class'=>'form-control','required']) !!}
    </div>
    
    <div>
      {{Form::submit('SUBMIT', ['class' => 'btn btn-primary'])}}
    </div><br>
    <button class="btn btn-default"><a href="/queueline">VIEW QUEUE</a></button>

  {!! Form::close() !!}
  
  <script type="text/javascript">
  $("select[name='id_studenttype']").change(function(){
      var id_studenttype = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('select-ajax') ?>",
          method: 'POST',
          data: {id_studenttype:id_studenttype, _token:token},
          success: function(data) {
            $("select[name='id_concern'").html('');
            $("select[name='id_concern'").html(data.options);
          }
      });
  });
</script>

@endsection


