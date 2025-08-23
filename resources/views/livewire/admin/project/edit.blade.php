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
        <label >Category</label>
        <select
          class="form-control"
         
          wire:model="form.category"
        >
          <option value="app">App</option>
          <option value="app-ongoing">App (Ongoing)</option>
          <option value="design">Design</option>
          <option value="freelance">Freelance</option>
        </select>
      </div>
      <div class="form-group">
        <label >The Best</label>
        <select
          class="form-control"
         
          wire:model="form.is_best"
        >
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
    ['livewire:load', 'livewire:navigated', 'DOMContentLoaded'].forEach(evt =>
      document.addEventListener(evt, function() {
        initTinyProject();
        initTinyDetail();
      }, false)
    );


    function initTinyProject() {
      tinymce.init({
        selector: '#projectInformation',
        plugins: [
          // Core editing features
          'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media',
          'searchreplace', 'table', 'visualblocks', 'wordcount',
          // Your account includes a free trial of TinyMCE premium features
          // Try the most popular premium features until Aug 25, 2025:
          'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker',
          'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode',
          'advtemplate', 'ai', 'uploadcare', 'mentions', 'tinycomments', 'tableofcontents',
          'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
          'importword', 'exportword', 'exportpdf', 'code'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
            value: 'First.Name',
            title: 'First Name'
          },
          {
            value: 'Email',
            title: 'Email'
          },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
          'See docs to implement AI Assistant')),
        uploadcare_public_key: '1d85ba9c1c4c6e34294b',
        setup: function(editor) {
          editor.on('init change', function() {
            editor.save();
          });

          // This section says that when you leave the text edit area, it will set whatever livewire variable you like to the currnt contents
          editor.on('blur', function(e) {
            @this.set('form.project_information', editor.getContent());
          });
        },
        content_css: "dark",
        skin: "oxide-dark",
      });
    }

    function initTinyDetail() {
      tinymce.init({
        selector: '#detailFeatures',
        plugins: [
          // Core editing features
          'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media',
          'searchreplace', 'table', 'visualblocks', 'wordcount',
          // Your account includes a free trial of TinyMCE premium features
          // Try the most popular premium features until Aug 25, 2025:
          'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker',
          'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode',
          'advtemplate', 'ai', 'uploadcare', 'mentions', 'tinycomments', 'tableofcontents',
          'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
          'importword', 'exportword', 'exportpdf', 'code'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
            value: 'First.Name',
            title: 'First Name'
          },
          {
            value: 'Email',
            title: 'Email'
          },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
          'See docs to implement AI Assistant')),
        uploadcare_public_key: '1d85ba9c1c4c6e34294b',
        setup: function(editor) {
          editor.on('init change', function() {
            editor.save();
          });

          // This section says that when you leave the text edit area, it will set whatever livewire variable you like to the currnt contents
          editor.on('blur', function(e) {
            @this.set('form.detail_features', editor.getContent());
          });
        },
        content_css: "dark",
        skin: "oxide-dark",
      });
    }
  </script>
@endpush
