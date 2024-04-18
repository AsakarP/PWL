@extends('layouts.main')

@section('container')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Polling</h1>
        <a href="{{ route('poll.create')}}" class="btn btn-primary">Tambah Poll</a>
    </div>
    <hr>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>IdPolling</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($polls->count()>0)
                @foreach ($polls as $poll)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $poll->idPolling }}</td>
                        <td class="align-middle">{{ $poll->matkul }}</td>
                        <td class="align-middle">{{ $poll->sks }}</td>

                        {{-- Mau nambahin Jumlah yang udah di voting itu berapa --}}
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('poll.show', $poll->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('poll.edit', $poll->id) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('poll.destroy',$poll->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Belum ada Polling</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection