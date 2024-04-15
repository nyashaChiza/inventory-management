<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="<KEY>" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class=" p-4 m-3">
    <table class="table table-bordered rounded">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Created</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>{{$category->created_at}}</td>
            </tr>
          
        @endforeach
           </tbody>
      </table>
    </div>
</body>
</html>