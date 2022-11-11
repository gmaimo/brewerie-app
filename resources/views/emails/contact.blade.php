@component('mail::message')
    <h2>Consulta recibida</h2>
    <p>Nos pondremos en contacto contigo en tu email {{$email}}</p>
    <h3>Tu mensaje ha sido:</h3>
    <p>{{$message}}</p>
@endcomponent

{{-- para añadir estilos personalizados quitar etiqueta de blade y poner puro css --}}