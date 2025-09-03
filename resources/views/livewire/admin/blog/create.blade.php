<div class="card">
  <div class="card-body">
    <h4 class="card-title">Basic form elements</h4>
    <p class="card-description"> Basic form elements </p>

    <form class="forms-sample" wire:submit="save">
      <div class="form-group">
        <label for="exampleInputName1">Title</label>
        <input
          class="form-control"
          id="exampleInputTitle1"
          type="text"
          placeholder="Title"
          wire:model="form.title"
        >
        <div class="text-danger text-small">
          @error('form.title')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputName1">Sub Title</label>
        <input
          class="form-control"
          id="exampleInputSubTitle1"
          type="text"
          placeholder="Sub title"
          wire:model="form.sub_title"
        >
        <div class="text-danger text-small">
          @error('form.sub_title')
            {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form-group form-check form-check-flat form-check-primary">
        <label class="form-check-label text-white">
          <input
            class="form-check-input"
            type="checkbox"
            wire:model="form.published"
          >
          Publish <i class="input-helper"></i>
        </label>
      </div>
      <div class="" wire:ignore>
        <label for="">Content</label>
        <textarea id="content" wire:model="form.content"> </textarea>
      </div>
      <div class="text-danger text-small form-group">
        @error('form.content')
          {{ $message }}
        @enderror
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
        initTinyContent();

      }, false)
    );

    function initTinyContent() {
      tinymce.init({
        selector: '#content',
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
        // content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
        setup: function(editor) {
          editor.on('init change', function() {
            editor.save();
          });

          // This section says that when you leave the text edit area, it will set whatever livewire variable you like to the currnt contents
          editor.on('blur', function(e) {
            @this.set('form.content', editor.getContent());
          });
        },
      });
    }
  </script>
@endpush
