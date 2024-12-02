<img 
class="h-{{$slot}} w-{{$slot}} rounded-full object-cover" 
src="{{ Auth::user() && Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('img/default-avatar.png') }}" 
alt="Profile Picture">