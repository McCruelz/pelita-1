<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    // Menampilkan form untuk membuat pengaduan
    public function create()
    {
        return view('complaints.create');
    }

    // Menyimpan laporan pengaduan
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi_laporan' => 'required|max:500',
            'bukti_laporan' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('bukti_laporan')) {
            $path = $request->file('bukti_laporan')->store('complaints');
        }

        Complaint::create([
            'id_pengguna' => Auth::id(),
            'deskripsi_laporan' => $request->deskripsi_laporan,
            'bukti_laporan' => $path,
            'status_laporan' => 'pending',
        ]);

        return redirect()->route('complaints.index')->with('success', 'Laporan pengaduan berhasil dibuat!');
    }

    public function index()
    {
        $complaints = Complaint::where('id_pengguna', Auth::id())->latest()->get();
    
        return view('complaints.index', compact('complaints'));
    }
    

    // Menampilkan deskripsi laporan pengaduan
    public function show(Complaint $complaint)
    {
        if ($complaint->id_pengguna != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('complaints.show', compact('complaint'));
    }

    // Admin melihat daftar laporan
    public function adminIndex()
    {
        $complaints = Complaint::latest()->get();
        return view('admin.complaints.index', compact('complaints'));
    }

    // Admin melihat deskripsi laporan
    public function adminShow(Complaint $complaint)
    {
        return view('admin.complaints.show', compact('complaint'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        $request->validate([
            'status_laporan' => 'required|in:pending,proses,selesai',
        ]);

        $complaint->update([
            'status_laporan' => $request->status_laporan,
        ]);

        return redirect()->route('admin.complaints.show', $complaint->id_laporan)
                         ->with('success', 'Status pengaduan berhasil diperbarui!');
    }
    

    
}

