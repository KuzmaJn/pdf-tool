<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('messages.tools') }}
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
</style>

<div class="container">
    <div class="tiles">
        <div class="tile active" data-action="merge">{{ __('messages.mergePdf') }}</div>
        <div class="tile" data-action="split">{{ __('messages.splitPdf') }}</div>
        <div class="tile" data-action="unlock">{{ __('messages.unlockPdf') }}</div>
        <div class="tile" data-action="lock">{{ __('messages.lockPdf') }}</div>
        <div class="tile" data-action="rotate">{{ __('messages.rotatePage') }}</div>
        <div class="tile" data-action="removePage">{{ __('messages.removePage') }}</div>
        <div class="tile" data-action="extractPage">{{ __('messages.extractPage') }}</div>
        <div class="tile" data-action="numberPages">{{ __('messages.addPageNumbers') }}</div>
        <div class="tile" data-action="create">{{ __('messages.createPdf') }}</div>
        <div class="tile" data-action="addWatermark">{{ __('messages.addWatermark') }}</div>
    </div>

    <form id="pdfForm" method="POST" action="#" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="action" id="actionInput" value="merge">
        <div id="inputsArea">
            <!-- Dynamic inputs will appear here -->
        </div>
        <button type="submit" id="submitBtn" disabled>{{ __('messages.process') }}</button>
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
                <label for="output_name">@lang('messages.outputFileName')</label>
                <input type="text" id="output_name" name="output_name" value="merged.pdf" required>
            </div>
        `,
        merge: `
            <div class="form-group">
                <label for="pdf_files">@lang('messages.pdfFilesToMerge')</label>
                <input type="file" id="pdf_files" name="pdf_files[]" accept="application/pdf" required multiple>
                <small>@lang('messages.selectMultiplePdfsToMerge')</small>
            </div>
        `,
        split: `
            <div class="form-group">
                <label for="pdf">@lang('messages.pdfFileToSplit')</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label>@lang('messages.splitAtPageNumber')</label>
                <input type="number" id="split_page" name="split_page" min="1" value="1">
            </div>
        `,
        lock: `
            <div class="form-group">
                <label for="pdf">@lang('messages.unprotectedPdfFile')</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="password">@lang('messages.password')</label>
                <input type="password" id="password" name="password" required>
            </div>
        `,
        unlock: `
            <div class="form-group">
                <label for="pdf">@lang('messages.protectedPdfFile')</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="password">@lang('messages.password')</label>
                <input type="password" id="password" name="password" required>
            </div>
        `,
        rotate: `
            <div class="form-group">
                <label for="pdf">@lang('messages.pdfFileToRotate')</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="page_number">@lang('messages.pageNumberToRotate')</label>
                <input type="number" id="page_number" name="page_number" min="1" required>
            </div>
            <div class="form-group">
                <label for="rotation_angle">@lang('messages.rotationAngle')</label>
                <select id="rotation_angle" name="rotation_angle">
                    <option value="90">@lang('messages.rotate90Clockwise')</option>
                    <option value="180">@lang('messages.rotate180')</option>
                    <option value="270">@lang('messages.rotate90CounterClockwise')</option>
                </select>
            </div>
        `,
        removePage: `
            <div class="form-group">
                <label for="pdf">@lang('messages.pdfFileToModify')</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="page_number">@lang('messages.pageNumberToRemove')</label>
                <input type="number" id="page_number" name="page_number" min="1" required>
            </div>
        `,
        extractPage: `
            <div class="form-group">
                <label for="pdf">@lang('messages.pdfFileToExtractFrom')</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="page_number">@lang('messages.pageNumberToExtract')</label>
                <input type="number" id="page_number" name="page_number" min="1" required>
            </div>
        `,
        numberPages: `
            <div class="form-group">
                <label for="pdf">@lang('messages.pdfFileToNumber')</label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <label for="position">@lang('messages.pageNumberPosition')</label>
                <select id="position" name="position">
                    <option value="bottom-center">@lang('messages.bottomCenter')</option>
                    <option value="bottom-right">@lang('messages.bottomRight')</option>
                    <option value="bottom-left">@lang('messages.bottomLeft')</option>
                    <option value="top-center">@lang('messages.topCenter')</option>
                    <option value="top-right">@lang('messages.topRight')</option>
                    <option value="top-left">@lang('messages.topLeft')</option>
                </select>
            </div>
            <div class="form-group">
                <label for="start_number">@lang('messages.startingNumber')</label>
                <input type="number" id="start_number" name="start_number" min="1" value="1">
            </div>
        `,
        create: `
            <div class="form-group">
                <label for="create_title">@lang('messages.documentTitle')</label>
                <input type="text" id="create_title" name="title" class="form-control" placeholder="@lang('messages.enterDocumentTitle')" required >
                <small>@lang('messages.titleHelp')</small>
            </div>
            <div class="form-group">
                <label for="create_content">@lang('messages.content')</label>
                <textarea id="create_content" name="content" class="form-control" rows="6" placeholder="@lang('messages.typeBodyOfPdfHere')" required ></textarea>
                <small>@lang('messages.contentHelp')</small>
            </div>
            <button type="button" id="btn-fill-content" class="fill-btn">@lang('messages.fillWithTestText')</button>
            <div class="form-group">
                <label for="create_orientation">@lang('messages.pageOrientation')</label>
                <select id="create_orientation" name="orientation" class="form-control" >
                    <option value="portrait">@lang('messages.portrait')</option>
                    <option value="landscape">@lang('messages.landscape')</option>
                </select>
                <small>@lang('messages.choosePortraitOrLandscape')</small>
            </div>
        `,
        addWatermark: `
            <div class="form-group">
                <label for="watermark_pdf">@lang('messages.pdfFileToWatermark')</label>
                <input type="file" id="watermark_pdf" name="pdf" accept="application/pdf" required >
                <small>@lang('messages.selectPdfToAddWatermark')</small>
            </div>
            <div class="form-group">
                <label for="watermark_text">@lang('messages.watermarkText')</label>
                <input type="text" id="watermark_text" name="text" placeholder="@lang('messages.enterWatermarkText')" required maxlength="100">
                <small>@lang('messages.watermarkTextHelp')</small>
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
                    <a href="${data.processed_files[0]}" class="download-btn" download>@lang('messages.downloadFirstPart')</a>
                    <a href="${data.processed_files[1]}" class="download-btn" download>@lang('messages.downloadSecondPart')</a>
                </div>`;
            } else {
                document.getElementById('output').innerHTML =
                `<div class="output">
                    <a href="${data.processed_file}" class="download-btn" download>@lang('messages.downloadPdf')</a>
                </div>`;
            }
        } else {
            document.getElementById('output').innerHTML =
            `<div class="output" style="background-color: #dc3545;">@lang('messages.error') ${data.message ?? '@lang('messages.unknownError')'}</div>`;
        }
        } else {
        document.getElementById('output').innerHTML =
            `<div class="output" style="background-color: #dc3545;">(@lang('messages.error') ${response.status}) ${data.cleanError ?? ""}${data.message ?? ""}</div>`;
        }
    });

    // Initial render
    renderInputs('merge');
</script>
</x-app-layout>
