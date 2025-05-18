{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--  <meta charset="UTF-8">--}}
{{--  <title>PDF Tool</title>--}}
{{--  <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--  <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--  <style>--}}
{{--    body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }--}}
{{--    .container { max-width: 500px; margin: 40px auto; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }--}}
{{--    .tiles { display: flex; gap: 16px; margin-bottom: 24px; }--}}
{{--    .tile {--}}
{{--      flex: 1;--}}
{{--      background: #e0e0e0;--}}
{{--      padding: 20px;--}}
{{--      text-align: center;--}}
{{--      border-radius: 6px;--}}
{{--      cursor: pointer;--}}
{{--      transition: background 0.2s;--}}
{{--      font-weight: bold;--}}
{{--    }--}}
{{--    .tile.active { background: #1976d2; color: #fff; }--}}
{{--    .form-group { margin-bottom: 16px; }--}}
{{--    label { display: block; margin-bottom: 6px; }--}}
{{--    input[type="text"], input[type="number"] {--}}
{{--      width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;--}}
{{--    }--}}
{{--    button[type="submit"]:disabled { background: #aaa; cursor: not-allowed; }--}}
{{--    button[type="submit"] { background: #1976d2; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; }--}}
{{--    .output { margin-top: 24px; padding: 16px; background: #e8f5e9; border-radius: 6px; text-align: center; }--}}
{{--    .download-btn { background: #388e3c; color: #fff; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; margin-top: 8px; }--}}
{{--  </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--  <h2>PDF Tool</h2>--}}
{{--  <div class="tiles">--}}
{{--    <div class="tile active" data-action="merge">Merge PDF</div>--}}
{{--    <div class="tile" data-action="remove">Remove Single Page</div>--}}
{{--  </div>--}}
{{--  --}}{{-- <form id="pdfForm" method="POST" enctype="multipart/form-data" action="{{ route('pdf.merge') }}"> --}}
{{--  <form id="pdfForm" action="#" enctype="multipart/form-data"> --}}
{{--    @csrf--}}
{{--    <input type="hidden" name="action" id="actionInput" value="merge">--}}
{{--    <div id="inputsArea">--}}
{{--      <!-- Dynamic inputs will appear here -->--}}
{{--    </div>--}}
{{--    <button type="submit" id="submitBtn" disabled>Submit</button>--}}
{{--  </form>--}}
{{--  <div id="output"></div>--}}

{{--</div>--}}
{{--<script>--}}
{{--  const tiles = document.querySelectorAll('.tile');--}}
{{--  const inputsArea = document.getElementById('inputsArea');--}}
{{--  const actionInput = document.getElementById('actionInput');--}}
{{--  const submitBtn = document.getElementById('submitBtn');--}}

{{--  const inputTemplates = {--}}
{{--    merge: `--}}
{{--      <div class="form-group">--}}
{{--        <label for="pdf1">PDF File 1</label>--}}
{{--        <input type="file" id="pdf1" name="pdf1" accept="application/pdf" required>--}}
{{--      </div>--}}
{{--      <div class="form-group">--}}
{{--        <label for="pdf2">PDF File 2</label>--}}
{{--        <input type="file" id="pdf2" name="pdf2" accept="application/pdf" required>--}}
{{--      </div>--}}
{{--    `,--}}
{{--    remove: `--}}
{{--      <div class="form-group">--}}
{{--        <label for="pdf">PDF File</label>--}}
{{--        <input type="file" id="pdf" name="pdf" accept="application/pdf" required>--}}
{{--      </div>--}}
{{--      <div class="form-group">--}}
{{--        <label for="page">Page Number to Remove</label>--}}
{{--        <input type="number" id="page" name="page" min="1" required>--}}
{{--      </div>--}}
{{--    `--}}
{{--  };--}}

{{--  function renderInputs(action) {--}}
{{--    inputsArea.innerHTML = inputTemplates[action];--}}
{{--    checkInputs();--}}
{{--    Array.from(inputsArea.querySelectorAll('input')).forEach(input => {--}}
{{--      input.addEventListener('input', checkInputs);--}}
{{--    });--}}
{{--  }--}}

{{--  function checkInputs() {--}}
{{--    const inputs = inputsArea.querySelectorAll('input');--}}
{{--    let allFilled = true;--}}
{{--    inputs.forEach(input => {--}}
{{--      if (!input.value.trim()) allFilled = false;--}}
{{--    });--}}
{{--    submitBtn.disabled = !allFilled;--}}
{{--  }--}}

{{--  tiles.forEach(tile => {--}}
{{--    tile.addEventListener('click', function() {--}}
{{--      tiles.forEach(t => t.classList.remove('active'));--}}
{{--      this.classList.add('active');--}}
{{--      const action = this.getAttribute('data-action');--}}
{{--      actionInput.value = action;--}}
{{--      renderInputs(action);--}}
{{--    });--}}
{{--  });--}}

{{--  // Handle form submission--}}
{{--  document.getElementById('pdfForm').addEventListener('submit', async function(e) {--}}
{{--    e.preventDefault();--}}
{{--    console.log('Form data:', new FormData(this));--}}
{{--    console.log('Action:', actionInput.value);--}}
{{--    const formData = new FormData(this);--}}
{{--    const action = actionInput.value;--}}
{{--    let url = '/pdf/' + action;--}}

{{--    const response = await fetch(url, {--}}
{{--      method: 'POST',--}}
{{--      body: formData,--}}
{{--      headers: {--}}
{{--        'Accept': 'application/json'--}}
{{--      }--}}
{{--    });--}}

{{--    if (response.ok) {--}}
{{--      const data = await response.json();--}}
{{--      console.log('Úspech: ' + JSON.stringify(data));--}}
{{--      if (data.status === 'success') {--}}
{{--        document.getElementById('output').innerHTML =--}}
{{--          `<div class="output">--}}
{{--            <a href="${data.merged_file}" class="download-btn" download>Stiahnuť PDF</a>--}}
{{--          </div>`;--}}
{{--      } else {--}}
{{--        document.getElementById('output').innerHTML =--}}
{{--          `<div class="output">Chyba: ${data.message ?? 'Neznáma chyba'}</div>`;--}}
{{--      }--}}
{{--    } else {--}}
{{--      document.getElementById('output').innerHTML =--}}
{{--        `<div class="output">Chyba: ${response.status}</div>`;--}}
{{--    }--}}
{{--  });--}}

{{--  // Initial render--}}
{{--  renderInputs('merge');--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}
