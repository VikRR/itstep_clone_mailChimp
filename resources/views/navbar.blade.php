<nav class="container">
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="{{ url('/subscribers/'.Auth::user()->id) }}">Subscriber list</a></li>
                <li><a href="#">Send mail</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>
    </div>
</nav>


{{--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-heading text-center subscriber-list">
                <h3>Subscriber List</h3>
                <a class="btn btn-default" href="{{ url('/subscribers/create') }}">Add new</a>
                <p>Данные {{ $subscriber_email }} успешно обновлены</p>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subscribers as $subscriber)
                        <tr>
                            <td>{{ $subscriber->first_name }} &nbsp; {{ $subscriber->last_name }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td>
                                <form action="{{ url('/subscribers/'.$user->id) }}" method="POST">
                                    {{ method_field('PUT') }}
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </form>
                            </td>
                            <td>
                                <form action="{{ url('/subscribers/'.$user->id) }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>--}}
