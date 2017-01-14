<?php
/*todo list:-
 * brief description of procedure
 *
 * prerequisites:
 * * cloud sync setup
 * * direct downloadable
 *
 * make api:
 * * setup cloud syncing for our file(link searches for popular services)
 * * methods for syncing:- hardlink, sync user-data folder, copy periodically
 * * handle syncing outside folder[hardlinks...]
 *
 * get direct link (make sure it's accessible, again link searches for generating direct links)
 *
 * provide link and you're done!
 */
?>
<div class="row clearfix">
    <div class="col-md-9">
        <h3 id="intro">Intro</h3>
        <p>This page will show you how to create your own Chrome bookmarks "API". It basically involves syncing the "bookmarks" file in your Chrome user data directory and direct linking it to this site. Before we get started, let's get the prerequisites out of the way, so that you don't have to waste your time setting it up only to find out that it won't work for you.</p>

        <h3 id="prereq">Prerequisites</h3>
        <ul>
            <li>You need to have cloud storage and syncing set up. Eg: Dropbox, Google Drive, Onedrive. Any service will do, so long as it meets the remaining requirements.</li>
            <li>Sharing to non-registered users</li>
            <li>Direct hotlinking(direct downloads) so that the file can be accessed by our server without being presented with a download page.</li>
        </ul>
        <h3 id="convin">Convenient features to have in your cloud syncing client</h3>
        <h4>Having 1 of these would be handy</h4>
        <ul>
            <li>Sync from multiple folders instead of just one folder. Or</li>
            <li>Hardlinks support (More on this later). Or</li>
            <li>Sync select files in a folder while excluding the rest</li>
        </ul>

        <h3 id="api">Create API</h3>
        <h4 id="setup">Setup</h4>
        <p>First thing we need to do is setup our syncing client. <a href="https://www.google.com/search?q=cloud+storage+providers">Download</a> one if you haven't already. I personally prefer <a href="https://preview.cubby.com">Cubby</a> for having all the features mentioned above.(FD: I'm not affiliated with them in any way, other than being a user.) Once we've got our sync client setup, it's time to send the 'Bookmarks' file to the cloud (this file is in JSON format, in case you were wondering). </p>

        <h4 id="sync">Sync</h4>
        <p>Methods of syncing...</p>
        <p>Syncing outside the folder on popular cloud providers are linked below:</p>
        <ul>
            <li><a target="_blank" href="https://www.google.com/search?q=dropbox+sync+outside+folder">Dropbox</a></li>
            <li><a href="https://www.google.com/search?q=google+drive+sync+outside+folder" target="_blank">Google Drive</a></li>
            <li><a href="https://www.google.com/search?q=skydrive+sync+outside+folder" target="_blank">OneDrive(formerly SkyDrive)</a></li>
            <li><a href="http://help.cubby.com/knowledgebase/articles/272836-can-i-choose-not-to-sync-specific-sub-folders-and" target="_blank">Cubby</a> - <a href="https://preview.cubby.com/pli/cubbyignore.txt/_02be86745c624e2794ba5180c235b9e9" target="_blank">Here</a> is the ignore file that I use. Make sure to rename it to '.cubbyignore.'</li>
            <li><a href="https://www.google.com/search?q=box+sync+outside+folder" target="_blank">Box</a></li>
            <li><a href="https://www.google.com/search?q=copy+barracuda+sync+outside+folder" target="_blank">Copy(by Barracuda)</a></li>
        </ul>

    </div>

    <div class="col-md-3">
        <div class="hidden-print affix" role="complementary">
            <ul>
                <li><a href="#intro">Introduction</a></li>
                <li>
                    <a href="#prereq">Prerequisites</a>
                    <ul>
                        <li><a href="#convin">Conveniences</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#api">Create API</a>
                    <ul>
                        <li><a href="#setup">Setup</a></li>
                        <li><a href="#sync">Sync</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>

