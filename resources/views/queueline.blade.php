@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-16">
      <br><button class="btn btn-default"><a href="{{route('addQueue')}}">ADD QUEUE</a></button>
  <h3>Queues in Line </h3>
  
      <div class="card">
          <table  class="table table-hover table-bordered display nowrap" cellspacing="0" width="100%" id="sampleTable">
            <thead>
              <tr>
                <th width="5px">Queue No.</th>
                <th width="40px">Student Number</th>
                <th width="100px">Student Type ID</th>
                <th width="200px">Concern</th>
              </tr>
            </thead>
                        @if(count($students) > 0)
                            @foreach($students as $row)
                              <tr>
                                  <td>{{$row->id}}</td>
                                  <td>{{$row->student_number}}</td>
                                  <td>{{$row->student_type_id}}</td>   
                                  <td>{{$row->student_concern}}</td>
                              </tr>
                              @endforeach
                        @endif
          </table>
      </div>
    </div>
  </div>
  <div> 
  
@endsection
