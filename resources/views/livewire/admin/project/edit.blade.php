<div class="card">
  <div class="card-body">
    <h4 class="card-title">Basic form elements</h4>
    <p class="card-description"> Basic form elements </p>

    <form class="forms-sample" wire:submit="save">
      <div class="form-group">
        <label for="exampleInputName1">Name</label>
        <input
          class="form-control"
          id="exampleInputName1"
          type="text"
          placeholder="Name"
          wire:model="form.name"
        >
      </div>
      <div class="form-group">
        <label for="exampleInputName1">Description</label>
        <input
          class="form-control"
          id="exampleInputDescription1"
          type="text"
          placeholder="Description"
          wire:model="form.description"
        >
      </div>

      <div class="form-group">
        <label>Category</label>
        <select class="form-control" wire:model="form.category">
          <option value="app">App</option>
          <option value="app-ongoing">App (Ongoing)</option>
          <option value="design">Design</option>
          <option value="freelance">Freelance</option>
        </select>
      </div>
      <div class="form-group">
        <label>The Best</label>
        <select class="form-control" wire:model="form.is_best">
          <option value="0">False</option>
          <option value="1">True</option>
        </select>
      </div>
      <div class="form-group">
        <label>Thumbnail</label>
        <x-filepond::upload wire:model="form.thumbnail" />
      </div>
      <div class="form-group">

        <label>Image (Multiple)</label>
        <x-filepond::upload wire:model="form.images" multiple />
      </div>
      <div class="form-group" wire:ignore>
        <label for="">Project Information</label>
        <textarea id="projectInformation" wire:model="form.project_information">{!! $this->form->project_information !!}</textarea>
      </div>
      <div class="form-group" wire:ignore>
        <label for="">Detail Features</label>
        <textarea id="detailFeatures" wire:model="form.detail_features">{!! $this->form->detail_features !!}</textarea>
      </div>

      <div class="text-right">
        <button
          class="btn btn-primary mr-2"
          type="submit"
          wire:loading.attr="disabled"
          wire:target="save"
        >
          <span wire:loading wire:target="save">
            <span
              class="spinner-border spinner-border-sm mr-1"
              role="status"
              aria-hidden="true"
            ></span>
            Loading...
          </span>
          <span wire:loading.remove wire:target="save">
            Submit
          </span>
        </button>
        <button class="btn btn-dark">Cancel</button>
      </div>
    </form>
  </div>
</div>

@push('bottom-script')
  <script>
    const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

    ['livewire:load', 'livewire:navigated', 'DOMContentLoaded'].forEach(evt =>
      document.addEventListener(evt, function() {
        initTinyProject();
        initTinyDetail();
      }, false)
    );


    function initTinyProject() {
      tinymce.init({
        selector: '#projectInformation',
        license_key: 'gpl',
        plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion',
        editimage_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: "undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl",
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        
        importcss_append: true,
        file_picker_callback: (callback, value, meta) => {
          /* Provide file and text for the link dialog */
          if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', {
              text: 'My text'
            });
          }

          /* Provide image and alt text for the image dialog */
          if (meta.filetype === 'image') {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.addEventListener('change', (e) => {
              const file = e.target.files[0];

              const reader = new FileReader();
              reader.addEventListener('load', () => {
                /*
                  Note: Now we need to register the blob in TinyMCEs image blob
                  registry. In the next release this part hopefully won't be
                  necessary, as we are looking to handle it internally.
                */
                const id = 'blobid' + (new Date()).getTime();
                const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                const base64 = reader.result.split(',')[1];
                const blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                callback(blobInfo.blobUri(), {
                  title: file.name
                });
              });
              reader.readAsDataURL(file);
            });

            input.click();
          }

          /* Provide alternative source and posted for the media dialog */
          if (meta.filetype === 'media') {
            callback('movie.mp4', {
              source2: 'alt.ogg',
              poster: 'https://www.google.com/logos/google.jpg'
            });
          }
        },
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image table',
        skin: useDarkMode ? 'oxide-dark' : 'oxide',
        content_css: useDarkMode ? 'dark' : 'default',
        setup: function(editor) {
          editor.on('init change', function() {
            editor.save();
          });

          // This section says that when you leave the text edit area, it will set whatever livewire variable you like to the currnt contents
          editor.on('blur', function(e) {
            @this.set('form.project_information', editor.getContent());
          });
        },
      });
    }

    function initTinyDetail() {
      tinymce.init({
        selector: '#detailFeatures',
        license_key: 'gpl',
        plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion',
        editimage_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: "undo redo | accordion accordionremove | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | code fullscreen preview | save print | pagebreak anchor codesample | ltr rtl",
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        
        importcss_append: true,
        file_picker_callback: (callback, value, meta) => {
          /* Provide file and text for the link dialog */
          if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', {
              text: 'My text'
            });
          }

          /* Provide image and alt text for the image dialog */
          if (meta.filetype === 'image') {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.addEventListener('change', (e) => {
              const file = e.target.files[0];

              const reader = new FileReader();
              reader.addEventListener('load', () => {
                /*
                  Note: Now we need to register the blob in TinyMCEs image blob
                  registry. In the next release this part hopefully won't be
                  necessary, as we are looking to handle it internally.
                */
                const id = 'blobid' + (new Date()).getTime();
                const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                const base64 = reader.result.split(',')[1];
                const blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                callback(blobInfo.blobUri(), {
                  title: file.name
                });
              });
              reader.readAsDataURL(file);
            });

            input.click();
          }

          /* Provide alternative source and posted for the media dialog */
          if (meta.filetype === 'media') {
            callback('movie.mp4', {
              source2: 'alt.ogg',
              poster: 'https://www.google.com/logos/google.jpg'
            });
          }
        },
        height: 600,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image table',
        skin: useDarkMode ? 'oxide-dark' : 'oxide',
        content_css: useDarkMode ? 'dark' : 'default',
        setup: function(editor) {
          editor.on('init change', function() {
            editor.save();
          });

          // This section says that when you leave the text edit area, it will set whatever livewire variable you like to the currnt contents
          editor.on('blur', function(e) {
            @this.set('form.detail_features', editor.getContent());
          });
        },
      });
    }
  </script>
@endpush
