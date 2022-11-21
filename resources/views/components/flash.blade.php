  @if (session()->has('success'))
      <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
          class="alert alert-success fixed-bottom me-4 ms-auto w-25">
          {{ session('success') }}
      </div>
  @elseif (session()->has('error'))
      <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
          class="alert alert-danger fixed-bottom me-4 ms-auto w-25">
          {{ session('error') }}
      </div>
  @endif
