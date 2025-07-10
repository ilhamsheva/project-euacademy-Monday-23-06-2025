<!DOCTYPE html>
<html lang="en-us">

@include('components.partials.head')

<body>
    @include('components.partials.nav')
    {{$slot}}
    @include('components.partials.footer')
</body>

<!-- Tambahkan Livewire Scripts -->
@include('components.partials.script')
@livewireScripts

</html>
