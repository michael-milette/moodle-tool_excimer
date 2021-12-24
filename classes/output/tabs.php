<?php
// This file is part of Moodle - http://moodle.org/  <--change
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace tool_excimer\output;

defined('MOODLE_INTERNAL') || die();

/**
 * Tabs component used for plugin.
 *
 * @package    tool_excimer
 * @author     Jason den Dulk <jasondendulk@catalyst-au.net>
 * @copyright  2021 Catalyst IT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class tabs implements \templatable {
    protected $activeurl;

    /**
     * Construct a tabs object.
     *
     * @param \moodle_url $activeurl
     */
    public function __construct(\moodle_url $activeurl) {
        $this->activeurl = $activeurl;
    }

    /**
     * Exports tabs for use with a template.
     *
     * @param \renderer_base $output
     * @return \array[][]
     * @throws \coding_exception
     */
    public function export_for_template(\renderer_base $output): array {
        $tabs = [
            'tabs' => [
                [
                    'link' => [[ 'link' => new \moodle_url('/admin/tool/excimer/slowest_grouped.php') ]],
                    'title' => get_string('report_slowest_grouped', 'tool_excimer'),
                    'text' => get_string('slowest_grouped', 'tool_excimer'),
                ],
                [
                    'link' => [[ 'link' => new \moodle_url('/admin/tool/excimer/slowest.php') ]],
                    'title' => get_string('report_slowest', 'tool_excimer'),
                    'text' => get_string('slowest', 'tool_excimer'),
                ],
                [
                    'link' => [[ 'link' => new \moodle_url('/admin/tool/excimer/recent.php') ]],
                    'title' => get_string('report_recent', 'tool_excimer'),
                    'text' => get_string('recent', 'tool_excimer'),
                ],
                [
                    'link' => [[ 'link' => new \moodle_url('/admin/tool/excimer/unfinished.php') ]],
                    'title' => get_string('report_unfinished', 'tool_excimer'),
                    'text' => get_string('unfinished', 'tool_excimer'),
                ],
            ],
        ];

        foreach ($tabs['tabs'] as &$tab) {
            if ($tab['link'][0]['link'] == $this->activeurl) {
                $tab['active'] = true;
            }
        }
        return $tabs;
    }
}