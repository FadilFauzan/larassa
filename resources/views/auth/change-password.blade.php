
    <!-- MODAL GANTI PASSWORD -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="{{ route('password.change') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        @foreach (['current_password', 'new_password', 'repeat_password'] as $field)
                            <div class="mb-3">
                                <label class="form-label">
                                    @if ($field === 'current_password')
                                        Current Password
                                    @elseif ($field === 'new_password')
                                        New Password
                                    @else
                                        Confirmation New Password
                                    @endif
                                </label>
                                <input type="password" name="{{ $field }}"
                                    class="form-control @error($field) is-invalid @enderror" required>
                                @error($field)
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    <script>
                                        // Jika ada error, otomatis buka modal
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const modal = new bootstrap.Modal(document.getElementById('formModal'));
                                            modal.show();
                                        });
                                    </script>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn badge-gradient bg-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
