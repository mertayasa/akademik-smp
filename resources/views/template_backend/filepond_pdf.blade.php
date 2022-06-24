@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/filepond/dist/filepond.css') }}">
    <link href="{{ asset('plugins/filepond/dist/image-preview/filepond-plugin-image-preview.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="{{ asset('plugins/filepond/dist/filepond.js') }}"></script>
    <script src="{{ asset('plugins/filepond/dist/validate-size/filepond-plugin-file-validate-size.js') }}"></script>
    <script src="{{ asset('plugins/filepond/dist/file-encode/filepond-plugin-file-encode.js') }}"></script>
    <script src="{{ asset('plugins/filepond/dist/validate-type/filepond-plugin-file-validate-type.js') }}"></script>
    <script src="{{ asset('plugins/filepond/dist/image-preview/filepond-plugin-image-preview.js') }}"></script>
    <script src="{{ asset('plugins/filepond/dist/image-crop/filepond-plugin-image-crop.js') }}"></script>
    <script src="{{ asset('plugins/filepond/dist/image-transform/filepond-plugin-image-transform.js') }}"></script>
    <script src="{{ asset('plugins/filepond/dist/image-resize/filepond-plugin-image-resize.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            FilePond.registerPlugin(
                FilePondPluginFileEncode,
                FilePondPluginFileValidateSize,
                FilePondPluginFileValidateType,
                FilePondPluginImagePreview
            )

            let options = {
                acceptedFileTypes: ['application/pdf'],
                maxFileSize: '5MB'
            }

            let imageUrl

            const url = window.location
            if (url.pathname.includes('edit')) {
                imageUrl = document.getElementById('filePondUpload').getAttribute('data-lampiran')
                if (!isNull(imageUrl)) {
                    options.files = [{
                        source: imageUrl,
                        options: {
                            type: 'remote'
                        }
                    }]
                }
            }

            FilePond.create(
                document.getElementById('filePondUpload'), options
            )
        })
    </script>
@endpush