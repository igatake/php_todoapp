<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">ToDo App</a>
  </nav>
</header>
<main>
  <div class="container">
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading">目標</div>
          <div class="panel-body">
            <a href="#" class="btn btn-default btn-block">
              目標を追加する
            </a>
          </div>
          <div class="list-group">
            @foreach($goals as $goal)
              <a href="{{ route('tasks.index', ['id' => $goal->id]) }}"
                class="list-group-item {{ $current_goal_id === $goal->id ? 'active' : '' }}"
                >
                {{ $goal->title }}
              </a>
            @endforeach
          </div>
        </nav>
      </div>
      <div class="column col-md-8">
        <!-- ここにタスクが表示される -->
      </div>
    </div>
  </div>
</main>
</body>
</html>