@extends('layouts.main')

@section('container')
    <h1 class="mb-0">Detail Polling</h1>
    <hr>
        <div class="row mb-3">
          <div class="col">
            <label>Id Polling</label>
            <input type="text" name="idPolling" class="form-control" placeholder="Id Polling" value="{{ $poll->idPolling }}" readonly>
          </div>
          <div class="col">
            <label>Mata Kuliah</label>
            <input type="text" name="matkul"class="form-control" placeholder="Mata Kuliah" value="{{ $poll->matkul }}" readonly>
          </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label>Jumlah SKS</label>
              <input type="text" name="sks" class="form-control" placeholder="Jumlah SKS" value="{{ $poll->sks }}" readonly>
            </div>
            <div class="col">
                <label>Created At</label>
                <input type="text" name="created_at" class="form-control" placeholder="Created" value="{{ $poll->created_at }}" readonly>
            </div>
          </div>
          </div>
        </div>     
@endsection