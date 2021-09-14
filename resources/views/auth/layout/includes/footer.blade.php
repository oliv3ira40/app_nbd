        {{-- @php
        $flash = session()->all();

        $notification = null;
        if (isset($flash['notification'])) {
            $notification = HelpAdmin::prepareNotification($flash['notification']);
        }
        @endphp

        @if ($notification != null)
            @section('type', $notification['type'])
            @section('msg', $notification['msg'])
        @endif
        <div style="display: none;" id="config_notifications" data-type="@yield('type')">@yield('msg')</div> --}}
        
        
        <!-- jQuery -->
        <script src="{{ asset('admin_theme/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

        <!-- Select2 JavaScript -->
		<script src="{{ asset('admin_theme/vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
                
        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('admin_theme/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin_theme/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>

        <!-- Slimscroll JavaScript -->
        <script src="{{ asset('admin_theme/theme/dist/js/jquery.slimscroll.js') }}"></script>

        <!-- Toast JavaScript -->
        <script src="{{ asset('admin_theme/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>

        {{-- JQUERY-MASK --}}
        <script src="{{ asset('plugins/jquery-mask-plugin/dist/jquery.mask.js') }}"></script>

        <!-- Init JavaScript -->
        <script src="{{ asset('admin_theme/theme/dist/js/init.js') }}"></script>


        {{-- My --}}
        <script src="{{ asset('js/utilities/masks.js') }}"></script>
        <script src="{{ asset('js/notifications.js') }}"></script>
    </body>
</html>