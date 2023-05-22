
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @foreach($vacantes as $vacante)

        <div class ="p-6 bg-red-400 border-double rounded-lg">
            <div>
                <a href="#" class="text-xl font-bold">
                    {{ $vacante -> titulo }}
                </a>
                @php
                    $ultimoDia = \Carbon\Carbon::parse($vacante->ultimo_dia);
                @endphp
                <p>Postulaciones antes del: {{ $ultimoDia->format('d/m/Y') }}</p>
                <p> {{ $vacante -> empresa }}</p>
            </div>
        </div>
        <br>

    @endforeach
</div>