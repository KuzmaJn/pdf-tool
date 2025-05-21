<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('PDF Tools') }}
    </h2>
</x-slot>

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
    .fill-btn {
        background: #eab100; color: #fff; border: none; padding: 10px 20px;
        border-radius: 4px; cursor: pointer; margin-bottom: 16px; text-decoration: none;
        display: inline-block;
    }
    .fill-btn:hover { background: #d08700; }
    .range-inputs { display: flex; gap: 10px; }
    .range-inputs input { flex: 1; }
    .file-preview { margin-top: 10px; max-width: 100%; }
    .hidden {
        display: none !important;
    }

    /* Spinner element */
    .spinner {
        display: inline-block;
        width: 24px;
        height: 24px;
        margin-top:6px;
        border: 3px solid rgba(0, 0, 0, 0.1);
        border-top-color: rgba(0, 0, 0, 0.6);
        border-radius: 50%;
        animation: spin 1s ease-in-out infinite;
    }

    #processText {
        margin: 160px 0;
    }

    /* Spinner animation */
    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    .okayBtn {
        background: #1976d2; color: #fff; border: none; padding: 10px 20px;
        border-radius: 4px; cursor: pointer; margin-top: 8px; text-decoration: none;
        display: inline-block;
    }

    /* Výstupný box – štandardné rozloženie */
    .pdf-tools--output {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding: 1rem;
    border-radius: 6px;
    margin-top: 1rem;
    font-size: 0.95rem;
    color: #fff;
    }

    /* Variant Error (červené pozadie, menej výrazné) */
    .pdf-tools--output--error {
        background-color: rgba(220, 53, 69, 0.9); /* tmavšie-červené so 90% krytím */
    }
    .pdf-tools--output--info {
        background-color: rgba(255, 193, 7, 0.9); /* tmavšie-žlté so 90% krytím */
    }

    /* Text vo vnútri */
    .pdf-tools--output-text {
    flex: 1;          /* roztiahne sa na maximum */
    line-height: 1.4;
    }

    /* Tlačidlo “Okay” */
    .pdf-tools--okay-btn {
    background-color: #c82333; /* sýta červená */
    border: none;
    color: #fff;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.9rem;
    transition: background-color 0.2s;
    }
    .pdf-tools--okay-btn:hover {
    background-color: #a71d2a; /* tmavšia na hover */
    }

</style>

<div class="container">
    <div class="tiles">
        <div class="tile active" data-action="merge">Merge PDF</div>
        <div class="tile" data-action="split">Split PDF</div>
        <div class="tile" data-action="unlock">Unlock PDF</div>
        <div class="tile" data-action="lock">Lock PDF</div>
        <div class="tile" data-action="rotate">Rotate Page</div>
        <div class="tile" data-action="removePage">Remove Page</div>
        <div class="tile" data-action="extractPage">Extract Page</div>
        <div class="tile" data-action="numberPages">Number Pages</div>
        <div class="tile" data-action="create">Create PDF</div>
        <div class="tile" data-action="addWatermark">Add Watermark</div>
    </div>

    <form id="pdfForm" method="POST" action="#" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="action" id="actionInput" value="merge">
        <div id="inputsArea">
            <!-- Dynamic inputs will appear here -->
        </div>
        <button type="submit" id="submitBtn" disabled>
            <span id="processText">Process</span>
        </button>
    </form>
    
    <div id="output">
        <!-- <span class="spinner hidden" id="spinner"></span> -->
    </div>
</div>

<script>
    const tiles = document.querySelectorAll('.tile');
    const inputsArea = document.getElementById('inputsArea');
    const actionInput = document.getElementById('actionInput');
    const submitBtn = document.getElementById('submitBtn');
    const output = document.getElementById('output');

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
        numberPages: `
            <div class="form-group">
                <label for="pdf">PDF File to Number</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="position">Page Number Position</label>
                <select id="position" name="position">
                    <option value="bottom-center">Bottom Center</option>
                    <option value="bottom-right">Bottom Right</option>
                    <option value="bottom-left">Bottom Left</option>
                    <option value="top-center">Top Center</option>
                    <option value="top-right">Top Right</option>
                    <option value="top-left">Top Left</option>
                </select>
            </div>
            <div class="form-group">
                <label for="start_number">Starting Number</label>
                <input type="number" id="start_number" name="start_number" min="1" value="1">
            </div>
        `,
        create: `
            <div class="form-group">
                <label for="create_title">Document Title</label>
                <input type="text" id="create_title" name="title" class="form-control" placeholder="Enter the document title" required >
                <small>The title that will appear at the top of your PDF</small>
            </div>
            <div class="form-group">
                <label for="create_content">Content</label>
                <textarea id="create_content" name="content" class="form-control" rows="6" placeholder="Type the body of your PDF here" required ></textarea>
                <small>Main text/content of your new PDF</small>
            </div>
            <button type="button" id="btn-fill-content" class="fill-btn"> Fill with Test Text </button>
            <div class="form-group">
                <label for="create_orientation">Page Orientation</label>
                <select id="create_orientation" name="orientation" class="form-control" >
                    <option value="portrait">Portrait</option>
                    <option value="landscape">Landscape</option>
                </select>
                <small>Choose portrait or landscape layout</small>
            </div>
        `,
        addWatermark: `
            <div class="form-group">
                <label for="watermark_pdf">PDF File to Watermark</label>
                <input type="file" id="watermark_pdf" name="pdf" accept="application/pdf" required >
                <small>Select the PDF you want to add a watermark to</small>
            </div>
            <div class="form-group">
                <label for="watermark_text">Watermark Text</label>
                <input type="text" id="watermark_text" name="text" placeholder="Enter watermark text" required maxlength="100">
                <small>Enter the text that will be overlaid on each page</small>
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

        if (action === 'create') {
            const btn = document.getElementById('btn-fill-content');
            if (btn) {
            btn.addEventListener('click', () => {
                document.getElementById('create_content').value = `Dolore sint aute commodo reprehenderit labore fugiat nisi nulla. Aliquip dolore fugiat occaecat esse nisi officia do. Et enim labore laboris magna mollit eiusmod enim aliquip sit ipsum quis laborum.

                Veniam exercitation ea tempor ipsum et reprehenderit nulla sit excepteur occaecat magna velit. Officia do velit pariatur cillum. Et consectetur nulla sint elit adipisicing anim cillum voluptate laboris excepteur est commodo adipisicing minim.

                Aliqua eiusmod est voluptate voluptate nostrud non pariatur. Excepteur pariatur sit velit anim labore consectetur cillum ea. Laborum non anim irure aliquip eu in ullamco laboris consequat. Veniam consequat mollit aute culpa est eu amet adipisicing. Duis labore do officia excepteur mollit est pariatur esse minim. Labore officia labore dolore esse excepteur exercitation sit eu labore eu sint dolor irure elit. Labore ipsum veniam veniam do dolore ad veniam ullamco id culpa est cupidatat cupidatat minim.

                Laboris cupidatat do dolore nisi elit qui aute sint adipisicing fugiat commodo. Elit esse dolore veniam mollit. Sunt anim eiusmod qui tempor ea enim nostrud. Esse duis pariatur fugiat quis ullamco tempor excepteur mollit do esse amet. Ea irure elit sunt ex magna labore. Dolore irure officia eiusmod incididunt exercitation eu ea dolor laborum anim. Nulla occaecat cillum officia amet quis.

                Ea deserunt nulla eu minim cillum cupidatat. Non ea occaecat commodo aliquip non ipsum dolore irure. Pariatur sit commodo ex mollit adipisicing labore esse excepteur esse voluptate esse aliqua. Ex eu deserunt laborum cupidatat. Labore tempor Lorem aute exercitation aute. Aliquip esse occaecat incididunt adipisicing nulla sunt incididunt dolore qui labore. Eu voluptate incididunt cupidatat eu ea consectetur reprehenderit officia velit quis tempor mollit exercitation. Fugiat et id elit exercitation dolor elit. Enim commodo veniam velit ipsum aliqua cupidatat aliqua culpa ex commodo anim eiusmod sit dolore. Reprehenderit mollit in ullamco sint quis dolor enim sint.
                
                Nulla sit excepteur occaecat magna velit. Officia do velit pariatur cillum. Et consectetur nulla sint elit adipisicing anim cillum voluptate laboris excepteur est ce sint adipisicing fugiat commodo. Elit esse dolore veniam mollit. Sunt anim eiusmod qui tempor ea enim nostrud. Esse duis pariatur fugiat quis ullamco tempor excepteur mollit do esse amet. Ea irure elit sunt ex magna labore. Dolore irure officia eiusmod incididunt exercitation eu ea dolor laborum anim. Nulla occaecat cillum officia amet quis.

                Lit qui aute nulla eu minim cillum cupidatat. Non ea occaecat commodo aliquip non ipsum dolore irure. Pariatur sit commodo ex mollit adipisicing labore esse excepteur esse voluptate esse aliqua. Ex eu deserunt laborum cupidatat. Labore tempor Lorem aute exercitation aute. Aliquip esse occaecat incididunt adipisicing nulla sunt incididunt dolore qui labore. Eu voluptate incididunt cupidatat eu ea consectetur reprehenderit officia velit quis tempor mollit exercitation. Fugiat et id elit exercitation dolor elit. Enim commodo veniam velit ipsum aliqua cupidatat aliqua culpa ex commodo anim eiusmod sit dolore. Reprehenderit mollit in ullamco sint quis dolor enim sint. Creatur nasca pes deserunt nulla eu minim cillum cupidatat. Non ea occaecat commodo aliquip non ipsum dolore irure. Pariatur sit commodo ex mollit adipisicing labore esse excepteur esse voluptate esse aliqua. Ex eu deserunt laborum cupidatat. Labore tempor Lorem aute exercitation aute. Aliquip esse occaecat incididunt adipisicing nulla sunt incididunt dolore qui labore. Eu voluptate incididunt cupidatat eu ea consectetur reprehenderit officia velit quis tempor mollit exercitation. Fugiat et id elit exercitation dolor elit. Enim commodo veniam velit ipsum aliqua cupidatat aliqua culpa ex commodo anim eiusmod sit dolore. Reprehenderit mollit in ullamco sint quis dolor enim sint.
                
                Ut laborum enim qui ullamco enim adipisicing magna nostrud deserunt. Sunt fugiat nostrud mollit proident in pariatur magna ex. Minim labore nostrud do cupidatat ut ullamco ex aute quis laboris quis deserunt aute laborum. Consectetur qui id pariatur est aliqua. Aliquip exercitation officia reprehenderit dolore non cillum eu laborum elit. Voluptate tempor irure sint fugiat ex quis culpa aliquip irure ex anim deserunt ipsum. Elit incididunt deserunt minim esse consectetur qui est labore pariatur nostrud ea.

                Nostrud duis adipisicing officia irure amet nisi nulla dolor deserunt. Cillum veniam irure cillum enim commodo anim cillum. Elit magna magna id amet laboris do est nulla in. Exercitation in dolor cupidatat ut sunt veniam eu laborum id deserunt. Qui labore ullamco exercitation ut incididunt dolore commodo aliqua do. Occaecat culpa dolor amet sunt dolore adipisicing elit amet et sunt quis Lorem. Proident irure ipsum labore consequat aute ex proident commodo ipsum. Proident non consequat est ut fugiat culpa consequat ad officia cillum commodo in quis consectetur. Id fugiat pariatur reprehenderit ea ut dolore voluptate quis elit. Qui ex excepteur amet do aliquip qui incididunt culpa duis laboris elit nisi sint occaecat. Esse aute ipsum Lorem velit. Ullamco Lorem ullamco labore ullamco pariatur consectetur laboris et incididunt ea.
                `;
                checkInputs();
            });
            }
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
            clearOutput();
            renderInputs(action);
        });
    });

    function clearOutput() {
        document.getElementById('output').innerHTML = '';
        document.getElementById('output').classList = '';
    }

    function createOutputElement(message) {
        // Vrátime tlačidlo “Okay”
        const okayBtn = document.createElement('button');
        okayBtn.className = 'pdf-tools--okay-btn';
        okayBtn.innerText = 'Okay';
        okayBtn.addEventListener('click', () => {
            submitBtn.disabled = false;
            clearOutput();
        });

        // Nájdeme výstupný div, vyčistíme ho a pridáme jednu CSS-triedu
        output.innerHTML = '';
        output.className = 'pdf-tools--output pdf-tools--output--error';

        // Správa
        const txt = document.createElement('span');
        txt.className = 'pdf-tools--output-text';
        txt.innerText = message;
        collapseDoubleBR(txt);

        output.appendChild(txt);
        output.appendChild(okayBtn);

    }

    function collapseDoubleBR(el) {
        let html = el.innerHTML;
        // kým nájdeš aspoň jedno <br><br>, zameníš ho za jeden:
        while (html.indexOf('<br><br>') !== -1) {
            html = html.replace('<br><br>', '<br>');
        }
        el.innerHTML = html;
    }

    function inicializeSpinner() {
        //Inicializuj spinner a načítavanie 
        const spinner = document.createElement('span');
        spinner.className = 'spinner';
        spinner.id = 'spinner';

        output.innerHTML = '';
        output.style.justifyContent = 'center';
        output.appendChild(spinner);
        
        //vytvor text element 
        const txt = document.createElement('span');
        txt.innerHTML = 'Spracovávam...';
        output.appendChild(txt);
        output.className = 'pdf-tools--output pdf-tools--output--info';
    }

    // Handle form submission
    document.getElementById('pdfForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        // Zobraz spinner
        inicializeSpinner();

        //Deaktivuj tlačidlo
        submitBtn.disabled = true;

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
        clearOutput();
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
            createOutputElement(`Chyba: ${data.message ?? 'Neznáma chyba'}`);
        }
        } else {
            createOutputElement(`(Chyba: ${response.status}) ${data.cleanError ?? ""}${data.message ?? ""}`);
        }
    });

    // Initial render
    renderInputs('merge');
</script>
</x-app-layout>
