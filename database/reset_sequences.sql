-- ====================================================================
-- Verinova: SQL Script Reset Sequence PostgreSQL (Supabase)
-- Jalankan query ini di Supabase SQL Editor jika Anda melakukan import data
-- secara manual atau ingin memastikan sequence ID auto-increment sinkron.
-- ====================================================================

DO $$
BEGIN
    -- users
    IF EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'users') THEN
        PERFORM setval(pg_get_serial_sequence('users', 'id'), COALESCE((SELECT MAX(id) FROM users), 1), (SELECT MAX(id) FROM users) IS NOT NULL);
    END IF;

    -- class_profiles
    IF EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'class_profiles') THEN
        PERFORM setval(pg_get_serial_sequence('class_profiles', 'id'), COALESCE((SELECT MAX(id) FROM class_profiles), 1), (SELECT MAX(id) FROM class_profiles) IS NOT NULL);
    END IF;

    -- students
    IF EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'students') THEN
        PERFORM setval(pg_get_serial_sequence('students', 'id'), COALESCE((SELECT MAX(id) FROM students), 1), (SELECT MAX(id) FROM students) IS NOT NULL);
    END IF;

    -- organizations
    IF EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'organizations') THEN
        PERFORM setval(pg_get_serial_sequence('organizations', 'id'), COALESCE((SELECT MAX(id) FROM organizations), 1), (SELECT MAX(id) FROM organizations) IS NOT NULL);
    END IF;

    -- schedules
    IF EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'schedules') THEN
        PERFORM setval(pg_get_serial_sequence('schedules', 'id'), COALESCE((SELECT MAX(id) FROM schedules), 1), (SELECT MAX(id) FROM schedules) IS NOT NULL);
    END IF;

    -- galleries
    IF EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'galleries') THEN
        PERFORM setval(pg_get_serial_sequence('galleries', 'id'), COALESCE((SELECT MAX(id) FROM galleries), 1), (SELECT MAX(id) FROM galleries) IS NOT NULL);
    END IF;

    -- achievements
    IF EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'achievements') THEN
        PERFORM setval(pg_get_serial_sequence('achievements', 'id'), COALESCE((SELECT MAX(id) FROM achievements), 1), (SELECT MAX(id) FROM achievements) IS NOT NULL);
    END IF;

    -- class_infos
    IF EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'class_infos') THEN
        PERFORM setval(pg_get_serial_sequence('class_infos', 'id'), COALESCE((SELECT MAX(id) FROM class_infos), 1), (SELECT MAX(id) FROM class_infos) IS NOT NULL);
    END IF;

    -- duty_schedules
    IF EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = 'duty_schedules') THEN
        PERFORM setval(pg_get_serial_sequence('duty_schedules', 'id'), COALESCE((SELECT MAX(id) FROM duty_schedules), 1), (SELECT MAX(id) FROM duty_schedules) IS NOT NULL);
    END IF;

    RAISE NOTICE 'Seluruh sequence tabel Verinova berhasil disinkronkan!';
END $$;
