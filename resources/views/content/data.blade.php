@extends('layouts.app')
@section('content')

<div class="row">
    <h1 class="text-center mb-3 mt-5">Project Monitoring</h1>
    <div class="col-lg-4">
        <a href="/tambah" type="button" class=" clo-lg-4 btn btn-success">Tambah Project </a>
    </div>
    <div class="row lg-2 align-items-center">
        <div class="col-auto">
            <br>
            <form class="form-inline" action="/cari" method="GET">
                <div class="form-group mx-5 mb-2">
                    <label text-right for="disabledTextInput" class="form-label">Search by Client </label>
                    <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                <button type="submit" class="btn btn-dark mb-2">Cari</button>
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif

        <table class="table mt-5">
            <thead class="table-secondary table-primary">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">PROJECT NAME</th>
                    <th scope="col">CLIENT</th>
                    <th scope="col">PROJECT LEADER</th>
                    <th scope="col">START DATE</th>
                    <th scope="col">END DATE</th>
                    <th scope="col">PROGRESS</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <th class="table-light" scope="row">{{ $loop->iteration }}</th>
                    <td class="table-light col-md-2">{{ $row->project_name}}</td>
                    <td class="table-light col-md-2">{{ $row ->client}}</td>
                    <td class="table-light">
                        <img src="{{asset('storage/'.$row->leader_photo)}}" alt="" align="left" style="width: 40px; height: 40px; border-radius: 50%;">
                        &nbsp;&nbsp;{{ $row->leader_name}}<br>
                        &nbsp;&nbsp;{{ $row->leader_mail}}
                    </td>
                    <td class="table-light">{{ $row->start_date->format ('d M Y')}}</td>
                    <td class="table-light">{{ $row->end_date->format ('d M Y')}}</td>
                    <td class="table-light">
                        @if ($row->progress == 100)
                        <div class="progress ">
                            <div class="progress-bar text-left" style="width:100%">{{$row->progress}}%</div>
                        </div>
                        @else
                        <div class="progress ">
                            <div class="progress-bar bg-success" style="width:{{$row->progress}}%">{{$row->progress}}%</div>
                        </div>
                        @endif
                    </td>
                    <td class="table-light">
                        <a href="/delete/{{$row->id}}" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span></a>
                        <a href="/edit/{{$row->id}}" class="btn btn-success">
                            <span class="glyphicon glyphicon-pencil"></span></a>
                        </a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
        {{ $data->links() }}
    </div>
</div>
@endsection