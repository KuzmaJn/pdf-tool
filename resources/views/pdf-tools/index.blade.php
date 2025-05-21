<x-app-layout>
<style>
    body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
    .container { max-width: 800px; margin: 40px auto; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
    .tiles { display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 24px; }
    .tile {
        flex: 1 1 calc(20% - 12px);
        min-width: 120px;
        background: #e0e0e0;
        padding: 15px 10px;
        text-align: center;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s;
        font-weight: bold;
        font-size: 14px;
    }
    .tile:hover { background: #d0d0d0; }
    .tile.active { background: #1976d2; color: #fff; }
    .form-group { margin-bottom: 16px; }
    label { display: block; margin-bottom: 6px; font-weight: bold; }
    input[type="text"],
    input[type="number"],
    input[type="password"],
    input[type="file"],
    select,
    textarea {
        width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;
        box-sizing: border-box;
    }
    button[type="submit"]:disabled { background: #aaa; cursor: not-allowed; }
    button[type="submit"] {
        background: #1976d2; color: #fff; border: none; padding: 12px 24px;
        border-radius: 4px; cursor: pointer; font-size: 16px; font-weight: bold;
        transition: background 0.2s;
    }
    button[type="submit"]:hover { background: #1565c0; }
    .output { margin-top: 24px; padding: 16px; background: #e8f5e9; border-radius: 6px; text-align: center; }
    .download-btn {
        background: #388e3c; color: #fff; border: none; padding: 10px 20px;
        border-radius: 4px; cursor: pointer; margin-top: 8px; text-decoration: none;
        display: inline-block;
    }
    .download-btn:hover { background: #2e7d32; }
    .range-inputs { display: flex; gap: 10px; }
    .range-inputs input { flex: 1; }
    .file-preview { margin-top: 10px; max-width: 100%; }
</style>

<div class="container">
    <h2>PDF Tool</h2>
    <div class="tiles">
        <div class="tile active" data-action="merge">Merge PDF</div>
        <div class="tile" data-action="split">Split PDF</div>
        <div class="tile" data-action="unlock">Unlock PDF</div>
        <div class="tile" data-action="lock">Lock PDF</div>
        <div class="tile" data-action="rotate">Rotate Page</div>
        <div class="tile" data-action="removePage">Remove Page</div>
        <div class="tile" data-action="extractPage">Extract Page</div>
        <div class="tile" data-action="pagenumber">Add Page Numbers</div>
        <div class="tile" data-action="create">Create PDF</div>
        <div class="tile" data-action="pdf2word">PDF to Word</div>
        <div class="tile" data-action="jpg2pdf">JPG to PDF</div>
    </div>

    <form id="pdfForm" method="POST" action="#" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="action" id="actionInput" value="merge">
        <div id="inputsArea">
            <!-- Dynamic inputs will appear here -->
        </div>
        <button type="submit" id="submitBtn" disabled>Process</button>
    </form>

    <div id="output"></div>
</div>

<script>
    const tiles = document.querySelectorAll('.tile');
    const inputsArea = document.getElementById('inputsArea');
    const actionInput = document.getElementById('actionInput');
    const submitBtn = document.getElementById('submitBtn');

    const inputTemplates = {
        tmpOutputNameFile: `
            <div class="form-group">
                <label for="output_name">Output File Name</label>
                <input type="text" id="output_name" name="output_name" value="merged.pdf" required>
            </div>
        `,
        merge: `
            <div class="form-group">
                <label for="pdf_files">PDF Files to Merge</label>
                <input type="file" id="pdf_files" name="pdf_files[]" accept="application/pdf" required multiple>
                <small>Select multiple PDF files to merge</small>
            </div>
        `,
        split: `
            <div class="form-group">
                <label for="pdf">PDF File to Split</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label>Split At Page Number</label>
                <input type="number" id="split_page" name="split_page" min="1" value="1">
            </div>
        `,
        lock: `
            <div class="form-group">
                <label for="pdf">Unprotected PDF File</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
        `,
        unlock: `
            <div class="form-group">
                <label for="pdf">Protected PDF File</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
        `,
        rotate: `
            <div class="form-group">
                <label for="pdf">PDF File to Rotate</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="page_number">Page Number to Rotate</label>
                <input type="number" id="page_number" name="page_number" min="1" required>
            </div>
            <div class="form-group">
                <label for="rotation_angle">Rotation Angle</label>
                <select id="rotation_angle" name="rotation_angle">
                    <option value="90">90° Clockwise</option>
                    <option value="180">180°</option>
                    <option value="270">90° Counter-Clockwise</option>
                </select>
            </div>
        `,
        removePage: `
            <div class="form-group">
                <label for="pdf">PDF File to Modify</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="page_number">Page Number to Remove</label>
                <input type="number" id="page_number" name="page_number" min="1" required>
            </div>
        `,
        extractPage: `
            <div class="form-group">
                <label for="pdf">PDF File to Extract From</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="page_number">Page Number to Extract</label>
                <input type="number" id="page_number" name="page_number" min="1" required>
            </div>
        `,
        pagenumber: `
            <div class="form-group">
                <label for="pdf">PDF File to Number</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="position">Page Number Position</label>
                <select id="position" name="position">
                    <option value="bottom-center">Bottom Center</option>
                    <option value="bottom-right">Bottom Right</option>
                    <option value="top-center">Top Center</option>
                    <option value="top-right">Top Right</option>
                </select>
            </div>
            <div class="form-group">
                <label for="start_number">Starting Number</label>
                <input type="number" id="start_number" name="start_number" min="1" value="1">
            </div>
        `,
        create: `
            <div class="form-group">
                <label for="content">PDF Content</label>
                <textarea id="content" name="content" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label for="output_name">Output File Name</label>
                <input type="text" id="output_name" name="output_name" value="document.pdf" required>
            </div>
        `,
        pdf2word: `
            <div class="form-group">
                <label for="pdf">PDF File to Convert</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="output_name">Output File Name</label>
                <input type="text" id="output_name" name="output_name" value="converted.docx" required>
            </div>
        `,
        jpg2pdf: `
            <div class="form-group">
                <label for="images">JPG Images to Convert</label>
                <input type="file" id="images" name="images[]" accept="image/jpeg" required multiple>
                <small>Select multiple JPG images to convert to PDF</small>
            </div>
            <div class="form-group">
                <label for="output_name">Output File Name</label>
                <input type="text" id="output_name" name="output_name" value="converted.pdf" required>
            </div>
            <div class="form-group">
                <label for="orientation">Page Orientation</label>
                <select id="orientation" name="orientation">
                    <option value="portrait">Portrait</option>
                    <option value="landscape">Landscape</option>
                </select>
            </div>
        `
    };

    function renderInputs(action) {
        inputsArea.innerHTML = inputTemplates[action];
        checkInputs();

        // Add event listeners to all inputs
        Array.from(inputsArea.querySelectorAll('input, select, textarea')).forEach(input => {
            input.addEventListener('input', function() {
                checkInputs();
                clearOutput();
            });
            input.addEventListener('change', function() {
                checkInputs();
                clearOutput();
            });
        });

        // Special handling for split options
        if (action === 'split') {
            const splitOption = document.getElementById('split_option');
            const rangeGroup = document.getElementById('range_group');

            splitOption.addEventListener('change', function() {
                rangeGroup.style.display = this.value === 'range' ? 'block' : 'none';
                checkInputs();
            });

            // Initial state
            rangeGroup.style.display = splitOption.value === 'range' ? 'block' : 'none';
        }
    }

    function checkInputs() {
        const inputs = inputsArea.querySelectorAll('input[required], select[required], textarea[required]');
        let allFilled = true;

        inputs.forEach(input => {
            if (input.type === 'file') {
                if (!input.files || input.files.length === 0) {
                    allFilled = false;
                }
            } else if (!input.value.trim()) {
                allFilled = false;
            }
        });

        submitBtn.disabled = !allFilled;
    }

    tiles.forEach(tile => {
        tile.addEventListener('click', function() {
            tiles.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            const action = this.getAttribute('data-action');
            actionInput.value = action;
            renderInputs(action);
            clearOutput();
        });
    });

    function clearOutput() {
        document.getElementById('output').innerHTML = '';
    }

    // Handle form submission
    document.getElementById('pdfForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        console.log('Form data:', new FormData(this));
        console.log('Action:', actionInput.value);
        const formData = new FormData(this);
        const action = actionInput.value;
        let url = '/pdf/' + action;

        const response = await fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'Accept': 'application/json'
        }
        });

        const data = await response.json();
        if (response.ok) {
        console.log('Úspech: ' + JSON.stringify(data));
        if (data.status === 'success') {
            if (action == "split") {
                document.getElementById('output').innerHTML =
                `<div class="output">
                    <a href="${data.processed_files[0]}" class="download-btn" download>Stiahnuť prvú časť PDF</a>
                    <a href="${data.processed_files[1]}" class="download-btn" download>Stiahnuť druhú časť PDF</a>
                </div>`;
            } else {
                document.getElementById('output').innerHTML =
                `<div class="output">
                    <a href="${data.processed_file}" class="download-btn" download>Stiahnuť PDF</a>
                </div>`;
            }
        } else {
            document.getElementById('output').innerHTML =
            `<div class="output" style="background-color: #dc3545;">Chyba: ${data.message ?? 'Neznáma chyba'}</div>`;
        }
        } else {
        document.getElementById('output').innerHTML =
            `<div class="output" style="background-color: #dc3545;">(Chyba: ${response.status}) ${data.cleanError ?? ""}${data.message ?? ""}</div>`;
        }
    });

    // Initial render
    renderInputs('merge');
</script>
</x-app-layout>
