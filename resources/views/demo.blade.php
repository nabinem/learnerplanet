<x-app-layout>

    @push('pluginCss')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <link href="https://unpkg.com/@silvermine/videojs-quality-selector/dist/css/quality-selector.css" rel="stylesheet">
    <link href="{{ asset('plugins/videojs-hls-quality-selector/dist/videojs-hls-quality-selector.css') }}"
        rel="stylesheet">
    @endpush

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0"> Demo</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="{{ route('courses.index') }}">My Created Courses</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Demo
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
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <i class="bi bi-play-circle-fill"></i>
                                        <b>Demo Video Players</b>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-10 mt-3 border py-4">
                                            <h5>HLS STREAMING VIDEOS(Plyr.io Hls.js Implementation) playing
                                                from .m3u8
                                                <a href="https://www.youtube.com/watch?v=aGHCyzVqfrQ"
                                                    target="_blank">https://www.youtube.com/watch?v=aGHCyzVqfrQ</a>
                                                <hr />
                                            </h5>
                                            <video id="hlsPlayer" width="100%" class="" controls></video>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-10 mt-3 border py-4">
                                            <h5>VIDEO.JS plugin: @silvermine/videojs-quality-selector (list
                                                of 1080p/720p.mp4 files)
                                                <hr />
                                            </h5>
                                            <video id="videoJsQualitySelectorDemo" class="video-js vjs-default-skin"
                                                style="width: 854px; height: 480px;" controls>
                                                <source
                                                    src="http://learnerplanet.local/VIDEOS_TEST/RESOLUTIONS/sample_1080p.mp4"
                                                    label="1080p">
                                                <source
                                                    src="http://learnerplanet.local/VIDEOS_TEST/RESOLUTIONS/sample_720p.mp4"
                                                    label="720p">
                                                <source
                                                    src="http://learnerplanet.local/VIDEOS_TEST/RESOLUTIONS/sample_480p.mp4"
                                                    label="480p" selected="true">
                                                <source
                                                    src="http://learnerplanet.local/VIDEOS_TEST/RESOLUTIONS/sample_240p.mp4"
                                                    label="240p">
                                            </video>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-10 mt-3 border py-4">
                                            <h5>VIDEO.JS plugin: videojs-contrib-quality-levels(most
                                                downloaded)
                                                <hr />
                                            </h5>
                                            <div id="fixture"></div>
                                            <div id="quality-levels">
                                                <h2>Quality Levels:</h2>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-10 mt-3 border py-4">
                                            <h5>VIDEO.JS plugin: jb-videojs-hls-quality-selector plugin
                                                (similar to above plyr.io/hls.js implementation which may be
                                                better)
                                                <hr />
                                            </h5>
                                            <video id="jbHlsQtSelectorPlayer" class="video-js vjs-default-skin"
                                                style="width: 854px; height: 480px;" controls>
                                                <!--<source src="http://learnerplanet.local/VIDEOS_TEST/HLS/sample.m3u8">-->
                                                <source
                                                    src="https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8">
                                            </video>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-10 mt-3 border py-4">
                                            <h5>VIDEO.JS m3u8 file without any plugin: you can see no
                                                quality selector
                                                <hr />
                                            </h5>
                                            <video class="video-js vjs-default-skin" data-setup="{}"
                                                style="width: 854px; height: 480px;" controls>
                                                <source
                                                    src="https://cph-p2p-msl.akamaized.net/hls/live/2000341/test/master.m3u8"
                                                    type="application/x-mpegURL">
                                            </video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @push('pluginScripts')
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <script
        src="https://unpkg.com/@silvermine/videojs-quality-selector/dist/js/silvermine-videojs-quality-selector.min.js">
    </script>
    <script src="{{ asset('plugins/videojs-hls-quality-selector/dist/jb-videojs-hls-quality-selector.min.js') }}">
    </script>
    @endpush

    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
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