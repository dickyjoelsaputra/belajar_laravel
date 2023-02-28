<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Auth;

class Student extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    //events
    // protected static function booted(): void
    // {
    //     static::created(function (Student $student) {
    //         ActivityLog::create([
    //             'description' => 'siswa dibuat dengan nama ' . $student->name . ' oleh user : ' . Auth::user()->name
    //         ]);
    //     });
    // }

    protected $fillable = [
        'name', 'gender', 'nim', 'class_id', 'image', 'extracurricular_id', 'slug'
    ];

    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id', 'extracurricular_id');
    }
}
