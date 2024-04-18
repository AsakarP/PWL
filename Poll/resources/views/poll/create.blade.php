@extends('layouts.main')

@section('container')
    <h1 class="mb-0">Tambah Polling</h1>
    <hr>
    <form action={{ route('poll.store') }} method="POST">
        @csrf
        <div class="row mb-3">
          <div class="col">
            <input type="text" name="idPolling" class="form-control" placeholder="Id Polling">
          </div>
          <div class="col">
            <input type="text" name="matkul"class="form-control" placeholder="Mata Kuliah">
          </div>
        </div>

        <div class="row mb-3">
            <div class="col">
              <input type="text" name="sks" class="form-control" placeholder="Jumlah SKS">
            </div>
        </div>
          <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
        
    </form>      
@endsection