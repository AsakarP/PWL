@extends('layouts.main')

@section('container')
    <h1 class="mb-0">Edit Polling</h1>
    <hr>
    <form action="{{ route('poll.update', $poll->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
          <div class="col">
            <label>Id Polling</label>
            <input type="text" name="idPolling" class="form-control" placeholder="Id Polling" value="{{ $poll->idPolling }}" >
          </div>
          <div class="col">
            <label>Mata Kuliah</label>
            <input type="text" name="matkul"class="form-control" placeholder="Mata Kuliah" value="{{ $poll->matkul }}" >
          </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label>Jumlah SKS</label>
              <input type="text" name="sks" class="form-control" placeholder="Jumlah SKS" value="{{ $poll->sks }}" >
            </div>
            <div class="col">
                <label>Created At</label>
                <input type="text" name="created_at" class="form-control" placeholder="Created" value="{{ $poll->created_at }}" readonly>
            </div>
          </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label>Updated At</label>
              <input type="text" name="updated_at" class="form-control" placeholder="Updated" value="{{ $poll->updated_at }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>       
@endsection