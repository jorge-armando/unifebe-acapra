@php
    $idadeMin = (int) request()->get('idade_min', 0);
    $idadeMax = (int) request()->get('idade_max', 30);
@endphp

<style>
    .slider-container {
        max-width: 320px;
    }
    .values {
        font-size: 14px;
        margin-bottom: 6px;
    }
    .input {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .current-value {
        min-width: 28px;
        text-align: center;
        font-weight: bold;
        font-size: 16px;
    }
</style>

<div class="slider-container">
    <div class="values">
        <span id="min-value">{{ $idadeMin }}</span> - <span id="max-value">{{ $idadeMax }}</span> anos
    </div>

    {{-- Esses inputs que vão no GET --}}
    <input type="hidden" name="idade_min" id="idade_min" value="{{ $idadeMin }}">
    <input type="hidden" name="idade_max" id="idade_max" value="{{ $idadeMax }}">

    <div class="input">
        {{-- Slider controla a idade máxima --}}
        <input type="range" id="slider" min="0" max="30" value="{{ $idadeMax }}" step="1" />
        <div class="current-value"><span id="current-value">{{ $idadeMax }}</span></div>
    </div>
</div>

<script>
    (function () {
        const slider = document.getElementById('slider');
        const currentValue = document.getElementById('current-value');
        const maxValue = document.getElementById('max-value');
        const idadeMaxInput = document.getElementById('idade_max');

        slider.addEventListener('input', () => {
            currentValue.textContent = slider.value;
            maxValue.textContent = slider.value;
            idadeMaxInput.value = slider.value;
        });
    })();
</script>
