<x-guest-layout>

            <div style="background-color: #0d6efd; color: white; text-align: center; border-radius: 1rem 1rem 0 0; padding: 1rem;">
                <h4 style="margin: 0; letter-spacing: 2px;">Connexion</h4>
            </div>
            <div style="padding: 1rem 0;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div style="margin-bottom: 1.5rem;">
                        <label for="email" style="display: block; margin-bottom: 0.5rem;">Adresse e-mail</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                               style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 0.375rem;">
                        @error('email')
                            <div style="color: #dc3545; margin-top: 0.25rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="margin-bottom: 1.5rem;">
                        <label for="password" style="display: block; margin-bottom: 0.5rem;">Mot de passe</label>
                        <input id="password" type="password" name="password" required
                               style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 0.375rem;">
                        @error('password')
                            <div style="color: #dc3545; margin-top: 0.25rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <div>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Se souvenir</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="font-size: 0.875rem; color: #0d6efd; text-decoration: none;">Mot de passe oublié?</a>
                        @endif
                    </div>
                    <div>
                        <button type="submit"
                                style="width: 100%; padding: 0.75rem; background-color: #0d6efd; color: white; border: none; border-radius: 0.375rem; font-weight: bold; cursor: pointer;">
                            Se connecter
                        </button>
                    </div>
                </form>
            </div>
            <div style="text-align: center; padding: 1rem 0; border-top: 1px solid #dee2e6; border-radius: 0 0 1rem 1rem;">
                <small>Pas encore de compte? <a href="{{ route('register') }}" style="color: #0d6efd; text-decoration: none;">Inscrivez-vous</a></small>
            </div>
        
    
</x-guest-layout>
