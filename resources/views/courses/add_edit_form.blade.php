<x-app-layout>
    
    @push('pluginCss')
        <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
        <link href="https://unpkg.com/@silvermine/videojs-quality-selector/dist/css/quality-selector.css" rel="stylesheet">
        <link href="{{ asset('plugins/videojs-hls-quality-selector/dist/videojs-hls-quality-selector.css') }}" rel="stylesheet">
    @endpush

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0"> {{ $course->exists ? 'Edit Course' : 'Create a New Course' }} </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="{{ route('courses.index') }}">Create & Launch</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('courses.index') }}">My Created Courses</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $course->exists ? 'Edit Course' : 'Create a New Course' }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline mb-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! 
                            Form::model($course, [
                                'class' => 'form-horizontal',
                                'id' => 'courseForm',
                                'files' => true,
                                'autocomplete' => 'off',
                                'method' => $course->exists ? 'put' : 'post',
                                'route' => $course->exists ? ['courses.update', $course->id] : ['courses.store'] 
                        ]) !!}
                            <div class="card-body">
                                <div class="mb-3"> 
                                    <label for="courseTitle" class="form-label">
                                        Title of your Program/Course<b class="text-danger">*</b>
                                        <i class="bi bi-question-circle" data-bs-toggle="tooltip" title="Maximum of 100 characters allowed."></i>
                                    </label> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! Form::text('title', null, [
                                                'class' => 'form-control',
                                                'maxlength' => 100,
                                                'required' => true
                                            ]) !!}
                                            @error('title')
                                                <span class="form-text form-error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"> 
                                    <label for="courseCategory" class="form-label">
                                        Category of your Program/Course
                                        <i class="bi bi-question-circle" data-bs-toggle="tooltip"
                                            title="What category best fits your program/course"
                                        ></i>
                                    </label> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! 
                                                Form::select('category_id',
                                                    ['' => '-- Select Any --'] + $categories, 
                                                    null,
                                                    [
                                                        'class' => 'form-select'
                                                    ]
                                                );
                                            !!}
                                            @error('category_id')
                                                <span class="form-text form-error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"> 
                                    <label class="form-label">
                                        Short Description 
                                        <i class="bi bi-question-circle" data-bs-toggle="tooltip" 
                                            title="Short/Powerful description of your program that is displayed below title of a program."></i>
                                    </label> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! 
                                                Form::textarea('short_desc', null, [
                                                    'class' => 'form-control',
                                                    'rows' => 2
                                                ]) 
                                            !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"> 
                                    <label class="form-label">
                                        Description <b class="text-danger">*</b>
                                        <i class="bi bi-question-circle" data-bs-toggle="tooltip" 
                                            title="Elaborate description of your program everything your course has to offer."></i>
                                    </label> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! 
                                                Form::textarea('description', null, [
                                                    'class' => 'form-control',
                                                    'rows' => 5,
                                                    'required' => true
                                                ]) 
                                            !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4"> 
                                    <label class="form-label">
                                        Disclosure
                                        <i class="bi bi-question-circle" data-bs-toggle="tooltip" 
                                            title="Optional: you only need a disclosure when you make a claim or share potential."></i>
                                    </label> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! 
                                                Form::textarea('disclosure', null, [
                                                    'class' => 'form-control',
                                                    'rows' => 2
                                                ]) 
                                            !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <i class="bi bi-play-circle-fill"></i> 
                                            <b>Media Section</b>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card mb-3">
                                            <div class="card-header">
                                                <label class="form-label">
                                                    <b>Course Thumbnail Image</b>
                                                    <i class="bi bi-question-circle" data-bs-toggle="tooltip" title="Upload image of less than 1MB"></i>
                                                    <span class="help-text">Maximum file size allowed 1MB</span>
                                                </label> 
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input 
                                                            type="file" 
                                                            name="thumbnail" 
                                                            class="form-control"
                                                            accept="image/*"
                                                        />
                                                        @error('thumbnail')
                                                            <span class="form-text form-error">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    @if (!empty($course->thumbnail))
                                                        <div class="col-md-12 mt-3 media-container">
                                                            <img 
                                                                src="{{ asset($course->thumbnail) }}" 
                                                                width="150"
                                                            />
                                                            <button 
                                                                type="button"
                                                                class="btn btn-sm delete-media-btn btn btn-outline-danger"
                                                                data-bs-toggle="tooltip" title="Delete image."
                                                                data-post-url="{{ route('courses.delete-media', [
                                                                    'course' => $course->id,
                                                                    'mediaField' => 'thumbnail'
                                                                ]) }}"
                                                            >
                                                                <i class="bi bi-trash-fill"></i>
                                                            </button>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-3" id="trailerVidCont">
                                            <div class="card-header">
                                                <label class="form-label">
                                                    <i class="bi bi-film"></i>
                                                    <b>Course Trailer Video</b>
                                                    <i class="bi bi-question-circle" data-bs-toggle="tooltip" title="Maximum size allowed 1GB"></i>
                                                </label> 
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 d-sm-flex mb-3">
                                                        <div class="form-check"> 
                                                            {!!
                                                                Form::radio('trailer_storage_type', 'local', null, [
                                                                    "class" => "form-check-input trailer-video-type show-hide-trigger",
                                                                    "data-hide-target" => ".tlVidTypeInputBox",
                                                                    "data-show-target" => "#tlVidTypeLocalInputBox"
                                                                ]);
                                                            !!}
                                                            <label class="form-check-label" for="trailerStorageTypeLocal">
                                                                Upload Your Own
                                                            </label>
                                                        </div>
                                                        <div class="form-check ms-sm-3"> 
                                                            {!!
                                                                Form::radio('trailer_storage_type', 'external_web', null, [
                                                                    "class" => "form-check-input trailer-video-type show-hide-trigger",
                                                                    "data-hide-target" => ".tlVidTypeInputBox",
                                                                    "data-show-target" => "#tlVidTypeExtInputBox"
                                                                ]);
                                                            !!}
                                                            <label class="form-check-label" for="trailerStorageTypeExternal">
                                                                Link to Vimeo/Youtube Video
                                                            </label> 
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 initial-hide tlVidTypeInputBox" id="tlVidTypeLocalInputBox">
                                                        <input 
                                                            type="file" 
                                                            name="trailer" 
                                                            class="form-control"
                                                        />
                                                        @error('trailer')
                                                            <span class="form-text form-error">{{ $message }}</span>
                                                        @enderror
                                                        <div class="form-text fw-bold">Maximum file size allowed 1GB, For larger files use Vimeo/Youtube.</div>
                                                    </div>
                                                    <div class="col-sm-12 initial-hide tlVidTypeInputBox" id="tlVidTypeExtInputBox">
                                                        {!! Form::text('trailer_ext_link', null, [
                                                            'class' => 'form-control',
                                                        ]) !!}
                                                        @error('trailer_ext_link')
                                                            <span class="form-text form-error">{{ $message }}</span>
                                                        @enderror
                                                        <div class="form-text fw-bold">Youtube/Vimeo link starting with https://</div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-10 mt-3 border py-4">
                                                            <h5>HLS STREAMING VIDEOS(Plyr.io Hls.js Implementation) playing from .m3u8 
                                                                <a href="https://www.youtube.com/watch?v=aGHCyzVqfrQ" target="_blank">https://www.youtube.com/watch?v=aGHCyzVqfrQ</a>
                                                                <hr/> 
                                                            </h5>
                                                            <video id="hlsPlayer" width="100%" class="" controls></video>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-10 mt-3 border py-4">
                                                            <h5>VIDEO.JS plugin: @silvermine/videojs-quality-selector (list of 1080p/720p.mp4 files) <hr/> </h5>
                                                            <video id="videoJsQualitySelectorDemo" class="video-js vjs-default-skin" style="width: 854px; height: 480px;" controls>
                                                                <source src="http://learnerplanet.local/VIDEOS_TEST/RESOLUTIONS/sample_1080p.mp4" label="1080p">
                                                                <source src="http://learnerplanet.local/VIDEOS_TEST/RESOLUTIONS/sample_720p.mp4" label="720p">
                                                                <source src="http://learnerplanet.local/VIDEOS_TEST/RESOLUTIONS/sample_480p.mp4" label="480p" selected="true">
                                                                <source src="http://learnerplanet.local/VIDEOS_TEST/RESOLUTIONS/sample_240p.mp4" label="240p">
                                                            </video>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-10 mt-3 border py-4">
                                                            <h5>VIDEO.JS plugin: videojs-contrib-quality-levels(most downloaded)<hr/> </h5>
                                                            <div id="fixture"></div>
                                                            <div id="quality-levels">
                                                                <h2>Quality Levels:</h2>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-10 mt-3 border py-4">
                                                            <h5>VIDEO.JS plugin: jb-videojs-hls-quality-selector plugin (similar to above plyr.io/hls.js implementation which may be better)<hr/> </h5>
                                                            <video id="jbHlsQtSelectorPlayer" class="video-js vjs-default-skin" style="width: 854px; height: 480px;" controls>
                                                                <!--<source src="http://learnerplanet.local/VIDEOS_TEST/HLS/sample.m3u8">-->
                                                                <source src="https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8">
                                                            </video>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-10 mt-3 border py-4">
                                                            <h5>VIDEO.JS m3u8 file without any plugin: you can see no quality selector<hr/> </h5>
                                                            <video 
                                                                class="video-js vjs-default-skin"
                                                                data-setup="{}"
                                                                style="width: 854px; height: 480px;" controls>
                                                                <source 
                                                                    src="https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8" 
                                                                    type="application/x-mpegURL"
                                                                >
                                                            </video>
                                                        </div>
                                                    </div>

                                                    @if (!empty($course->trailer))
                                                        <div class="row">
                                                            <div class="col-sm-6 mt-3">
                                                                <video
                                                                    id="my-player"
                                                                    class="video-js"
                                                                    controls
                                                                    preload="auto"
                                                                    width="350"
                                                                    @if ($course->trailer_cover)
                                                                        poster="{{ asset($course->trailer_cover) }}"
                                                                    @endif
                                                                    data-setup='{}'
                                                                >
                                                                    <source src="{{ asset($course->trailer) }}"></source>
                                                                    <p class="vjs-no-js">
                                                                        To view this video please enable JavaScript, and consider upgrading to a
                                                                        web browser that
                                                                        <a href="https://videojs.com/html5-video-support/" target="_blank">
                                                                        supports HTML5 video
                                                                        </a>
                                                                    </p>
                                                                </video>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="card my-3">
                                                    <div class="card-header">
                                                        <label class="form-label">
                                                            <b>Trailer Cover Image</b> (optional)
                                                            <i class="bi bi-question-circle" data-bs-toggle="tooltip" title="Maximum size allowed 1MB"></i>
                                                            <span class="help-text">Only use this option if you have a trailer video added</span>
                                                        </label> 
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input 
                                                                    type="file" 
                                                                    name="trailer_cover" 
                                                                    class="form-control"
                                                                    accept="image/*"
                                                                />
                                                                @error('trailer_cover')
                                                                    <span class="form-text form-error">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            @if (!empty($course->trailer_cover))
                                                                <div class="col-md-12 mt-3 media-container">
                                                                    <img 
                                                                        src="{{ asset($course->trailer_cover) }}" 
                                                                        width="150"
                                                                    />
                                                                    <button 
                                                                        type="button"
                                                                        class="btn btn-sm delete-media-btn btn btn-outline-danger"
                                                                        data-bs-toggle="tooltip" title="Delete image."
                                                                        data-post-url="{{ route('courses.delete-media', [
                                                                            'course' => $course->id,
                                                                            'mediaField' => 'trailer_cover'
                                                                        ]) }}"
                                                                    >
                                                                        <i class="bi bi-trash-fill"></i>
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <i class="bi bi-credit-card"></i> 
                                            <b> Pricing Options </b>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <i class="bi bi-columns-gap"></i> 
                                            <b>Directory Options</b>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer"> 
                                <button type="submit" class="btn btn-lg btn-primary" data-loading-text="Saving..">
                                    <i class="bi bi-floppy"></i>
                                    Save
                                </button> 
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('pluginScripts')
        <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
        <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
        <script src="https://unpkg.com/@silvermine/videojs-quality-selector/dist/js/silvermine-videojs-quality-selector.min.js"></script>
       <script src="{{ asset('plugins/videojs-hls-quality-selector/dist/jb-videojs-hls-quality-selector.min.js') }}"></script>
    @endpush

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function(){
                $('#courseForm').validate({
                    rules: {
                        thumbnail: {
                            accept: "image/*",
                            filesize: 1000 //1MB
                        },
                        trailer: {
                            accept: "video/*",
                            filesize: (1000*1000) //1GB
                        },
                        trailer_ext_link: {
                            url: true
                        }
                    },
                    messages: {
                        thumbnail: {
                            accept: 'Please upload image of type jpg/png/gif',
                            filesize: 'Maximum allowed size: 1MB',
                        },
                        trailer: {
                            accept: 'Please upload valid video'
                        },
                        trailer_cover: {
                            accept: 'Please upload valid image',
                            filesize: 'Maximum allowed size: !MB',
                        }
			        },
                    submitHandler: function (form){
                        form.submit();
                        $(form).find("[type='submit']").button('loading');
                    }
                });

                //http://learnerplanet.local/VIDEOS_TEST/HLS/sample.m3u8
                //http://learnerplanet.local/VIDEOS_TEST/HLS/480_out.m3u8

                // --STARTS SCRIPT FOR -- HLS STREAMING VIDEOS (Plyr.io Hls.js Implementation) --
                var video = document.getElementById('hlsPlayer');
                if(Hls.isSupported()) {
                    var hls = new Hls();
                    hls.loadSource('http://learnerplanet.local/VIDEOS_TEST/HLS/sample.m3u8');
                    hls.on(Hls.Events.MANIFEST_PARSED, function(event, data) {
                        //video.play();
                        const availableQualitites = hls.levels.map(i => i.height);
                        const defaultOptions = {};
                        defaultOptions.controls = [
                            'play-large', // The large play button in the center
                            'restart', // Restart playback
                            'rewind', // Rewind by the seek time (default 10 seconds)
                            'play', // Play/pause playback
                            'fast-forward', // Fast forward by the seek time (default 10 seconds)
                            'progress', // The progress bar and scrubber for playback and buffering
                            'current-time', // The current time of playback
                            'duration', // The full duration of the media
                            'mute', // Toggle mute
                            'volume', // Volume control
                            'captions', // Toggle captions
                            'settings', // Settings menu
                            'pip', // Picture-in-picture (currently Safari only)
                            'airplay', // Airplay (currently Safari only)
                            //'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
                            'fullscreen', // Toggle fullscreen
                        ];
                        defaultOptions.quality = {
                            default: 720,//availableQualitites[0],
                            options: availableQualitites,
                            forced: true,
                            onChange: (e) => updateQuality(e)
                        };
                        new Plyr(video, defaultOptions);
                    });
                    hls.attachMedia(video);
                    window.hls = hls;
                } else {
                    //play mp3 video
                }

                function updateQuality(newQuality){
                    window.hls.levels.forEach((level, levelIndex) => {
                        if (level.height == newQuality){
                            window.hls.currentLevel = levelIndex;
                        }
                    });
                }
                // --ENDS SCRIPT FOR -- HLS STREAMING VIDEOS(Plyr.io Hls.js Implementation) --

                
                // -- STARTS SCRIPT FOR -- VIDEO.JS plugin: @silvermine/videojs-quality-selector plugin --
                videojs('videoJsQualitySelectorDemo', {}, function() {
                    var player = this;

                    player.controlBar.addChild('QualitySelector');
                });
                // -- ENDS SCRIPT FOR -- VIDEO.JS plugin: @silvermine/videojs-quality-selector plugin --

                // -- STARTS SCRIPT FOR -- VIDEO.JS plugin: videojs-contrib-quality-levels --
                function createQualityButton(qualityLevel, parent) {
                    var button = document.createElement('button');
                    var classes = button.classList;

                    if (qualityLevel.enabled) {
                        classes.add('enabled');
                    } else {
                        classes.add('disabled');
                    }

                    button.innerHTML = qualityLevel.id + ': ' + qualityLevel.bitrate + ' kbps';
                    button.id = 'quality-level-' + qualityLevel.id;
                    button.type = 'button';

                    button.onclick = function() {
                        var old = qualityLevel.enabled;
                        qualityLevel.enabled = !old;
                        button.classList.toggle('enabled');
                        button.classList.toggle('disabled');
                    }
                    parent.appendChild(button);
                }

                function createPlayer(callback) {
                    var video = document.createElement('video');
                    video.id = 'videojs-contrib-quality-levels-player';
                    video.className = 'video-js vjs-default-skin';
                    video.setAttribute('controls', true);
                    video.setAttribute('height', 300);
                    video.setAttribute('width', 600);
                    document.querySelector('#fixture').appendChild(video);

                    var options = {
                        autoplay: false,
                        qualityLevels: {}
                    };
                    var url = 'http://learnerplanet.local/VIDEOS_TEST/HLS/sample.m3u8';
                    var type = 'application/x-mpegURL';

                    try {
                        window.player = videojs(video.id, options);

                        window.player.src({
                            src: url,
                            type: type
                        });

                        callback(window.player);
                    } catch(err) {
                        console.log("caught an error trying to create and add src to player:", err);
                    }
                }
                function setup(player) {
                    player.ready(function() {
                        var qualityLevels = player.qualityLevels();
                        var container = document.getElementById('quality-levels');

                        qualityLevels.on('addqualitylevel', function(event) {
                            createQualityButton(event.qualityLevel, container);
                        });

                        qualityLevels.on('change', function(event) {
                            for (var i = 0; i < qualityLevels.length; i++) {
                                var level = qualityLevels[i];
                                var button = document.getElementById('quality-level-' + level.id);

                                button.classList.remove('selected');
                            }

                            var selected = qualityLevels[event.selectedIndex];
                            var button = document.getElementById('quality-level-' + selected.id);
                            button.classList.add('selected');
                        })
                    });
                }

                (function(window, videojs) {
                    createPlayer(setup);
                })(window, window.videojs);
                // -- ENDS SCRIPT FOR - VIDEO.JS plugin: videojs-contrib-quality-levels --
                
                // -- STARTS SCRIPT FOR - VIDEO.JS plugin: jb-videojs-hls-quality-selector --
                var jbHlsPlayer = videojs('jbHlsQtSelectorPlayer');
                //jbHlsPlayer.controlBar.removeChild('settingsButton');
                jbHlsPlayer.hlsQualitySelector({
                    displayCurrentQuality: true,
                    defaultQuality: '720p'
                });
                // -- ENDS SCRIPT FOR - VIDEO.JS plugin: jb-videojs-hls-quality-selector --
                
            });
        </script>
    @endpush

</x-app-layout>