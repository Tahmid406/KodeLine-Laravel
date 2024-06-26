import { Link } from "@inertiajs/react";

export default function Guest({ children, auth }) {
    return (
            <div className="min-h-screen flex flex-col sm:justify-center items-center items-center pt-10 sm:pt-0 bg-white">
                <div>
                    <Link href="/">
                        {/* <ApplicationLogo className="w-20 h-20 fill-current text-gray-500" /> */}
                        <img
                            className="w-60 mt-10"
                            src="../assets/Kodeline kids_Black Logo.svg"
                            alt="logo"
                        />
                    </Link>
                </div>
                <div className="w-full sm:max-w-md mt-2 px-6 py-1 bg-white overflow-hidden sm:rounded-lg">
                    {children}
                </div>
            </div>
    );
}
