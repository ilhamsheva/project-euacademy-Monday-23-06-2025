@php
    use App\Models\Course;

    $courses = Course::with('eventCourse')->get(); // eager load untuk efisiensi
@endphp

<!-- Courses Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="h1 section-title bg-white text-center text-primary px-3">Courses</h6>
        </div>
        <br>
        <br>
        <br>
        <div class="row g-4 justify-content-center">
            @foreach ($courses as $key => $course)
                @php
                    $eventCourse = $course->eventCourse;
                @endphp
                @if ($eventCourse && $eventCourse->photo)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + $key * 0.2 }}s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="{{ asset('storage/' . $eventCourse->photo) }}"
                                    style="width:100%; height:250px; object-fit:cover;" alt="{{ $course->name }}">
                                <div
                                    class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    @guest
                                        <a href="{{ route('login') }}" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                            style="border-radius: 0 30px 30px 0;">Login to Join</a>
                                    @else
                                        <a href="{{ url('courses/register') }}"
                                            class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                            style="border-radius: 0 30px 30px 0;">Join Now</a>
                                    @endguest
                                </div>
                            </div>
                            <div class="text-center p-4 pb-0">
                                <h3 class="mb-0">Rp {{ number_format($eventCourse->price, 2, ',', '.') }}</h3>
                                <div class="mb-3">
                                    @for ($i = 0; $i < 5; $i++)
                                        <small class="fa fa-star text-primary"></small>
                                    @endfor
                                </div>
                                <h5 class="mb-4">{{ $course->name }}</h5>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2">
                                    <i
                                        class="fa fa-user-tie text-primary me-2"></i>{{ $course->teacher->name ?? 'Unknown' }}
                                </small>
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-clock text-primary me-2"></i>{{ $eventCourse->duration ?? '-' }}
                                    Bulan
                                </small>
                                <small class="flex-fill text-center py-2">
                                    <i class="fa fa-clock text-primary me-2"></i>{{ ucfirst($course->status) ?? '' }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- Courses End -->
