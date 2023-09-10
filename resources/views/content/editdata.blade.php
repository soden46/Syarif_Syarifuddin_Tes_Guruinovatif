<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Syarif Syarifuddin | Tes Guruinovatif</title>
</head>

<body>
    <h1 class="text-center mb-4"> Edit Project</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('update',$data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="project_name" class="form-label">Project Name</label>
                                <input type="text" name="project_name" class="form-control" id="project_name" value="{{$data->project_name}}">
                            </div>
                            <div class="mb-3">
                                <label for="client" class="form-label">Client</label>
                                <input type="text" name="client" class="form-control" id="client" value="{{$data->client}}">
                            </div>
                            <div class="mb-3">
                                <label for="leader_name" class="form-label">Nama Leader</label>
                                <input type="text" name="leader_name" class="form-control" id="leader_name" value="{{$data->leader_name}}">
                            </div>
                            <div class="mb-3">
                                <label for="leader_mail" class="form-label">Email</label>
                                <input type="email" name="leader_mail" class="form-control" id="leader_mail" aria-describedby="emailHelp" value="{{$data->leader_mail}}">
                            </div>
                            <div class="mb-3">
                                <label for="leader_photo" class="form-label">Masukkan foto leader</label>
                                <input type="file" name="leader_photo" class="form-control" id="leader_photo" value="{{$data->leader_photo}}">
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" name="start_date" class="form-control" id="start_date" value="{{Carbon\Carbon::parse($data->start_date)->format('Y-m-d')}}">
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" name="end_date" class="form-control" id="end_date" value="{{Carbon\Carbon::parse($data->end_date)->format('Y-m-d')}}">
                            </div>
                            <div class="mb-3">
                                <label for="progress" class="form-label">Progress</label>
                                <input type="text" name="progress" class="form-control" id="progress" value="{{$data->progress}}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button onclick="goBack()" class="btn btn-dark">Kembali</button>
                            <script>
                                function goBack() {
                                    window.history.back();
                                }
                            </script>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>