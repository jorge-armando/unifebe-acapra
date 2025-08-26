<style>
    body {
        font-family: sans-serif;
    }
    .slider-container {
        max-width: 400px;
    }
    .values {
        font-size: 14px;
    }
    .current-value {
        text-align: center;
        margin-left: 10px;
        font-weight: bold;
        font-size: 16px;
    }
    .input {
        display: flex;
        align-items: center;
    }
</style>

<div class="slider-container">
    <div class="values">
        <span><span id="min-value">0</span></span> - <span><span id="max-value">30</span></span>
    </div>

    <div class="input">
        <input type="range" id="slider" min="0" max="30" value="15" step="1" />
        <div class="current-value"><span id="current-value">15</span></div>
    </div>
</div>

<script>
    const slider = document.getElementById('slider');
    const currentValue = document.getElementById('current-value');

    // Atualiza dinamicamente o valor atual
    slider.addEventListener('input', () => {
    currentValue.textContent = slider.value;
    });
</script>