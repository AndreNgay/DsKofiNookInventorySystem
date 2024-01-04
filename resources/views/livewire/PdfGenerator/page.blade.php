<div>
    <h1>It's working</h1>

    <div class="col-md-2">
        <button class="btn btn-primary w-100" wire:click="generatePDF">
            Export to PDF
        </button>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('downloadPDF', function (data) {
            var link = document.createElement('a');
            link.href = data.pdfPath;
            link.download = 'generated_pdf.pdf';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    </script>
@endpush
