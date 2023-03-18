@props(['lunchs'])
@foreach ($lunchs as $lunch)
<div class="col-md-6 col-lg-3">
  <div class="card">
    <h5 class="text-center bg-gray-200 p-2">{{ $lunch->name }}</h5>
    <img src="{{ Storage::url($lunch->image) }}" class="">

      <h6 class=" text-center bg-gray-300 py-2 ">{{ $lunch->description }}</h6>

  </div>
</div>
@endforeach